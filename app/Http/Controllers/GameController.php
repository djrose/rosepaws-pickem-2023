<?php

namespace App\Http\Controllers;

use DB;
use App\Club;
use App\Game;
use App\Pick;
use App\User;
use App\Week;
use DateTime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Requests;
use App\Http\Requests\GameRequest;


class GameController extends Controller {
    /**
     * Determine current week & redirect to getScheduleData
     * @return  view/blade schedule page
     */
    public function index() {
        $chosen_week_id = Redis::hget('redis_session', 'chosen_week_id'); 
        $games = Game::where('week_id', $chosen_week_id)->orderBy('game_start')->get(); 
        return view('pages.games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $clubs = array();
        $dbclubs = Club::where('sport_id', 2)->orderBy('city')->get();
        foreach ($dbclubs as $club) {
            $clubs[$club['id']] = $club['city'].' '.$club['team'];
        }

        $weeks = Week::where('season_id', 2)->orderBy('week_number')->pluck('week_number', 'id');
        $chosen_week_id = Redis::hget('redis_session', 'chosen_week_id'); 
        $games = Game::where('week_id', $chosen_week_id)->orderBy('game_start')->get(); 

        $last = Game::where('week_id', $chosen_week_id)->orderby('game_start', 'desc')->first();
echo $chosen_week_id;
dd($last);
        $gamedate = date_format(date_create($last['game_start']),'m/d/Y');
        $gametime = date_format(date_create($last['game_start']),'h:ia');

        if (!$last) {
            $date_placeholder = 'mm/dd/yy';
            $time_placeholder = 'h:i:s a';
        } else {
            $date_placeholder = $gamedate;
            $time_placeholder = $gametime;
        }

        return view('pages.games.create', compact('clubs', 'weeks', 'games', 'chosen_week_id', 'gamedate', 'gametime', 'date_placeholder', 'time_placeholder'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $input = $request->all();
        $chosen_week_id = $input['chosen_week_id'];
        Redis::hset('redis_session', 'chosen_week_id', $chosen_week_id); 

        $tempDate = $input['gamedate'].' '.$input['gametime'].':00';
        $game_start = DateTime::createFromFormat('Y-m-d H:i:s', $tempDate, new \DateTimeZone('America/New_York'));
        $game_start->setTimezone(new \DateTimeZone('America/Phoenix'));

        $new_game = new Game;
        $new_game['week_id']        = $input['chosen_week_id'];
        $new_game['hometeam_id']    = $input['hometeam_id'];
        $new_game['awayteam_id']    = $input['awayteam_id'];
        $new_game['game_start']     = $game_start;
        $new_game['home_score']     = 0;
        $new_game['away_score']     = 0;
        $new_game['created_at']     = Carbon::now();
// dd($new_game);
        $new_game->save();
        // return redirect('games/'.$input['chosen_week_id']);
        return redirect('games/create');
    }

    /**
     * Display schedule page for desired week
     * @param  int  $desired week
     * @return \Illuminate\Http\Response
     */
    public function show($chosen_week_id) {
        //  bring in desired week from URL  (games/2)
        //  set desired week in Redis
        //  goto getScheduleData based on desired week
        $redis_session = Redis::hgetall('redis_session');
        $chosen_user_id = $redis_session['chosen_user_id'];
        $chosen_week_number = $redis_session['chosen_week_number'];

        $gamesB4cutoff = DB::table('games')
                ->orderBy('games.game_start')
                ->orderBy('games.tiebreaker')
                ->where('week_id', '=', $chosen_week_id)
                ->select('games.id', 'games.hometeam_id',
                    'games.awayteam_id', 'games.game_start',
                    'games.home_score', 'games.away_score',
                    'games.week_id', 'games.tiebreaker')
                ->get();

        $games = $this->getCutoffTime($gamesB4cutoff);

        $clubs = $this->getClubsArray();
        
        $picks = DB::table('picks')
            ->leftJoin('games', 'picks.game_id', '=', 'games.id')
            ->leftJoin('weeks', 'games.week_id', '=', 'weeks.id')
            ->orderBy('picks.game_id')
            ->select('picks.game_id', 'picks.user_id', 'picks.club_id', 
                'picks.points', 'weeks.week_number', 'weeks.id as week_id')
            ->where('week_id', '=', $chosen_week_id)
            ->where('picks.user_id', '=', $chosen_user_id)
            ->get();

        return view('pages.games.show', compact('games', 'clubs', 'picks', 'chosen_user_id', 'chosen_week_id', 'chosen_week_number'));
    }

    /**
     * Show the form for editing scores.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $chosen_week_id = $id;
        $chosen_week_number = Week::where('id', $chosen_week_id)->pluck('week_number');

            $games = DB::table('games')
                ->leftJoin('weeks', 'games.week_id', '=', 'weeks.id')
                ->leftJoin('clubs', 'games.awayteam_id', '=', 'clubs.id')
                ->orderBy('games.game_start')
                ->orderBy('clubs.initials')
                ->where('weeks.id', '=', $chosen_week_id)
                ->select('games.id as game_id', 'games.hometeam_id',
                    'games.awayteam_id', 'games.game_start',
                    'games.home_score', 'games.away_score',
                    'clubs.initials')
                ->get();

            $club = $this->getClubsArray();
// dd($games);
            return view('pages.games.editScores', compact('chosen_week_id', 'chosen_week_number', 'games', 'club'));
        }
    

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id) {
    //     $input = $request->all();
    public function update($id, GameRequest $request) {
        $chosen_week_id = $id;
        $input = $request->all();

        foreach ($input['game'] as $game_info) {
            if ($game_info['away_score'] == "" || $game_info['home_score'] == "") { 
                break; 
            } else {
                DB::table('games')->where('id', $game_info['game_id'])
                ->update(['away_score' => $game_info['away_score'],
                    'home_score' => $game_info['home_score']]);
            }
        }
 
        return redirect('/games/'.$id.'/edit');
    }


    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }


    /**
     * Print function to send views to printer
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function print($viewHTML = 'pages.games.index.blade') {
        // $pdf = PDF::make('dompdf.wrapper');
        $pdf = \PDF::loadView($viewHTML, $data = array( compact('games', 'clubs', 'picks', Redis::hget('redis_session', 'chosen_user_id'))));
dd("here also");
        return $pdf->download('schedule.pdf');

    }


    /**
     * Calculate cutoff time
     * @param  array  query results from Games table
     * @return array with cutoff time added
     */
    public function getCutoffTime($gamesB4cutoff) {
        $i = 0;
        $cutofftime = 0;
        $gamesWithCutoff = array();
        foreach ($gamesB4cutoff as $eachgame) {
            $localAz = Carbon::now('America/Phoenix');
            $dayOfWeek = (Carbon::parse($eachgame->game_start))->dayOfWeek;
            $currentgame = Carbon::parse($eachgame->game_start);
            if ($dayOfWeek == 0) {    // Sunday
                if ($currentgame->hour >= 16) {  // Sunday last games after 4pm
                    $cutofftime = Carbon::create($currentgame->year, $currentgame->month, $currentgame->day, '13', '00', '00', 'America/Phoenix');
                } else {
                    $cutofftime = $currentgame->subMinutes(15);
                }
            } elseif ($dayOfWeek == 1) {   // Monday
                $currentgame = $currentgame->subDay(1);
                $cutofftime = Carbon::create($currentgame->year, $currentgame->month, $currentgame->day, '13', '00', '00', 'America/Phoenix');
            } else {
                $cutofftime = $currentgame->subMinutes(15);
            }
            $gamesWithCutoff[$i]['id'] = $eachgame->id; 
            $gamesWithCutoff[$i]['hometeam_id'] = $eachgame->hometeam_id; 
            $gamesWithCutoff[$i]['awayteam_id'] = $eachgame->awayteam_id;
            $gamesWithCutoff[$i]['game_start']  = $eachgame->game_start;
            $gamesWithCutoff[$i]['home_score']  = $eachgame->home_score;
            $gamesWithCutoff[$i]['away_score']  = $eachgame->away_score;
            $gamesWithCutoff[$i]['week_id']     = $eachgame->week_id;
            $gamesWithCutoff[$i]['tiebreaker']  = $eachgame->tiebreaker;
            $gamesWithCutoff[$i]['cutofftime']  = $cutofftime->toDateTimeString();
            $i++;

        }
// echo "<pre>";
// print_r($gamesWithCutoff);
// echo "</pre>";
// dd("here");
        return $gamesWithCutoff;
    }
}