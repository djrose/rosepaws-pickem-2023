<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DB;
use App\Livefeed;
use App\Week;
use App\Season;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redis;

class LiveFeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('livefeed');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // delete the prior livefeed table
        Livefeed::truncate();


        // store the requested season & week
        $xml_season = $request->selectedyear;
        $xml_year = $request->selectedyear;
        $request_week = $request->selectedweek;

        //  determine what segment of the season has been requested
        //  if negative, then PRE-SEASON, 1-17 = REGULAR SEASON, >17 = POST SEASON
        if ($request_week < 1) {
            $xml_type = "PRE";
            $xml_week = abs($request_week);
            $total_games = 4;
        } else {
            $xml_type = "REG";
            if ($request_week > 17) {
                $xml_type = "POST";
                $xml_week = $request_week;
                $total_games = 4;
            } else {
                $xml_type = "REG";
                $xml_week = $request_week;
                $total_games = 17;
            }
        }


        $x=0;
        $y=0;
        $gameCount = 0;
        $weekCount = 0;

        DB::table('livefeeds')->delete();
        DB::unprepared('SET @@auto_increment_increment=10;');
        DB::unprepared('SET @@auto_increment_offset=2;');

        // DB::table('weeks')->delete();
        DB::unprepared('SET @@auto_increment_increment=10;');
        DB::unprepared('SET @@auto_increment_offset=2;');

        // DB::table('seasons')->delete();
        DB::unprepared('SET @@auto_increment_increment=10;');
        DB::unprepared('SET @@auto_increment_offset=2;');


        do {                    // gets entire season
            // get XML feed
            $games = simplexml_load_file("http://www.nfl.com/ajax/scorestrip?season=$xml_season&seasonType=$xml_type&week=$xml_week");
            $gameCount = count($games->gms[$x]->g) -1;

            // first record of each week has season (year) & week #
            foreach($games->gms[0]->attributes() as $a => $b) {
                if ($a == 'w') {$holdweek = $b; $week_number = $b;}
                if ($a == 'y') {$holdyear = $b;}
            }


            while ($y <= $gameCount) {   //  one week's worth of games
                foreach($games->gms[$x]->g[$y]->attributes() as $c => $d) {
                }
                // store substr of date into variables
                $gameYear = substr($games->gms[0]->g[$y]['eid'], 0,4);
                $gameMonth = substr($games->gms[0]->g[$y]['eid'], 4,2);
                $gameDay = substr($games->gms[0]->g[$y]['eid'], 6,2);
                $ampm = (string)$games->gms[0]->g[$y]['q'];


                // add seconds to time string & 2 digit hours
                if (strlen($games->gms[0]->g[$y]['t']) == 4) {
                    $gameTime = "0".$games->gms[0]->g[$y]['t'].":00";
                } else {
                    $gameTime = $games->gms[0]->g[$y]['t'].":00";
                }

                // add 12 hours to time string if feed is noted as PM
                if ($ampm == 'P') {
                    $gameTime = date('H:i:s', strtotime($gameTime."+ 12 hours"));
                    $tempHour = substr($gameTime,0,2);
                    if ($tempHour >= 21 || $tempHour < 1) {
                        $gameTime = date('H:i:s', strtotime($gameTime."- 12 hours"));
                    }
                }

                //  split time into substr variables
                $gameHour = substr($gameTime,0,2);
                $gameMin = substr($gameTime, 3,2);
                $gameSec = substr($gameTime, 6,2);

                // create a datetime format for insertion into DB
                $date3 = date_create();
                date_date_set($date3, $gameYear, $gameMonth, $gameDay);
                date_time_set($date3, $gameHour, $gameMin, $gameSec);
                $insertDate = $date3->format("Y-m-d H:i:s");
                $start_timestamp = $date3->format("Y-m-d H:i:s");
                $end_timestamp = $date3->format("Y-m-d H:i:s");

                // store team initials from feed into vaariables
                $hometeam_init = $games->gms[0]->g[$y]['h'];
                $awayteam_init = $games->gms[0]->g[$y]['v'];

                // if scores in feed are blank strings, change to integers or zero
                $games->gms[0]->g[$y]['hs'] == '' ? $homescore = 0 : $homescore = (int)$games->gms[0]->g[$y]['hs'];
                $games->gms[0]->g[$y]['vs'] == '' ? $awayscore = 0 : $awayscore = (int)$games->gms[0]->g[$y]['vs'];

                // get team id based on team initials from config file
                $hometeam_id = Config::get("nfl.".$hometeam_init, "none****");
                $awayteam_id = Config::get("nfl.".$awayteam_init, "none****"); 

                // if team initials not found, print out on screen to be checked and added to config file
                if ($hometeam_id == 'none****'| $awayteam_id  == 'none****') {
                    echo "wk: ".$week."   ";
                    echo $games->gms[0]->g[$y]['eid']."    ";
                    echo "CHECK THIS ONE ".$hometeam_init."   ".$awayteam_init ."<br/>";
                }

                //  check if last game of the week; if so, = tiebreaker
                $y == $gameCount ? $tiebreaker = 1 : $tiebreaker = 0;


                if ($y == 0) {
                    // if first game of the week, save date
                    $weekFstWeek = $insertDate;

                    if ($weekCount == 0 ) {
                         $seasonFstWeek = $insertDate;    //  first week of season
                
                        $seasons = Season::all();

                        // // establish season data; if none, create one for this season
                        // $season = $seasons->updateOrCreate(
                        //     [$season->season_start => $insertDate], 
                        //     [$season->sport_id => "2", 
                        //     $season->season_start => $insertDate]);

                        // check if matching record in table
                        $season = Season::where('season_start', $insertDate)->first();
                        if (! $season) {
                            $season= Season::create([
                                'sport_id'   => "2",
                                'season_start' => $insertDate,
                            ]);
                        }
                        $hold_season_id = $season['id'];
                    }
                    
                    // start a dummy record in weeks table for foreign key of games table
                    $weeks = Week::all();
                    $week = Week::where('start_timestamp', $insertDate)->first();
                    
                    if (!$week) {
                        $hold_week_id = DB::table('weeks')->insertGetId([
                                'season_id' => $hold_season_id,
                                'week_number' => $week_number,
                                'start_timestamp' => $start_timestamp,
                                'end_timestamp' => NULL,
                                'created_at'  => date("Y-m-d H:i:s"), 
                        ]);
                    }
                }  

                // if last game of the week, save date
                $weekLstWeek = $insertDate;
                $seasonLstWeek = $insertDate;


                //insert game record into livefeeds table
                DB::table('livefeeds')->insert(array(
                    array(
                    'week_id'     => $hold_week_id, 
                    'hometeam_id' => $hometeam_id,
                    'awayteam_id' => $awayteam_id,
                    'game_start'  => $insertDate,
                    'home_score'  => $homescore, 
                    'away_score'  => $awayscore,  
                    'tiebreaker'  => $tiebreaker,  
                    'created_at'  => date("Y-m-d H:i:s"), 
                    ),
                ));

                $y++;  // next game record
            }

            // setup array for week record

            // // update or create week record
            // $weeks = Week::all();
            // $week = $weeks->updateOrCreate(
            //     [$week->start_timestamp => $start_timestamp],
            //     [$week->start_timestamp => $start_timestamp,
            //      $week->season_id => $hold_season_id,
            //      $week->week_number => $week_number,
            //      $week->start_timestamp => $start_timestamp,
            //      $week->end_timestamp => $end_timestamp
            //     ]);


            // check if matching record in table
            $weeks = Week::all();
            $week = Week::where('id', $hold_week_id)->first();
            if ($week) {
                DB::table('weeks')
                    ->where('id', $hold_week_id)
                    ->update(['end_timestamp' => $weekLstWeek]);
            }

            $y = 0;
            $weekCount++;
            $xml_week++;

        } while ($xml_week <= $total_games);    // end of entire season


        //  finished all games for the season; rewriting the season record with ending date
        // $season = $seasons::updateOrCreate(
        //     [$season->season_start’ => $seasonFstWeek], 
        //     [$season->sport_id => "2", 
        //      $season->season_start => $seasonFstWeek, 
        //      $season->season_end => $seasonLstWeek]);


        $season = Season::where('id', $hold_season_id)->first();
        if ($season) {
            DB::table('seasons')
                ->where('id', $hold_season_id)
                ->update(['season_end' => $seasonLstWeek]);
        }


        echo $seasonLstWeek."   ";
        echo "done: year ".$xml_year;


    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
