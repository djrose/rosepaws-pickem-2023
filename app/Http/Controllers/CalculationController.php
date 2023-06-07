<?php

namespace App\Http\Controllers;

use DB;
use App\Club;
use App\Game;
use App\Pick;
use App\User;
use App\Week;
use App\Calculation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis; 

class CalculationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */

    public function index()
    {
        $chosen_week_number = Redis::hget('redis_session', 'chosen_week_number');
        $chosen_week_id = Redis::hget('redis_session', 'chosen_week_id');

        $picks = DB::table('picks')
            ->leftJoin('games', 'picks.game_id', '=', 'games.id')
            ->leftJoin('weeks', 'games.week_id', '=', 'weeks.id')
            ->orderBy('picks.game_id')->orderBy('picks.user_id')
            ->select('picks.game_id', 'picks.user_id', 'picks.club_id', 
                'picks.points', 'weeks.week_number', 'weeks.id as week_id')
            ->where('weeks.id', '=', $chosen_week_id)
            ->get();

        $games = Game::orderBy('games.game_start')->orderBy('games.id')
                ->select('games.id as game_id', 'games.week_id', 
                    'games.hometeam_id', 'games.awayteam_id', 
                    'games.game_start', 'games.home_score', 
                    'games.away_score', 'games.tiebreaker')
                ->where('games.week_id', $chosen_week_id)
                ->get();

        $pickgames = DB::table('picks')
            ->leftJoin('games', 'picks.game_id', '=', 'games.id')
            ->leftJoin('weeks', 'games.week_id', '=', 'weeks.id')
            ->orderBy('picks.user_id')->orderBy('tiebreaker')
            ->orderBy('picks.game_id')
            ->select('picks.game_id', 'picks.user_id', 'picks.club_id', 
                'picks.points', 'weeks.week_number', 'weeks.id as week_id',
                'games.hometeam_id', 'games.awayteam_id', 
                'games.home_score', 'games.away_score', 'games.tiebreaker')
            ->where('weeks.week_number', '=', $chosen_week_number)
            ->get();
// dd($pickgames);

        $clubs = $this->getClubsArray(); 

        $users = User::select('id', 'name')->orderBy('id')->get();

        $redisArray = $this->summarizeCorrectWeeklyPicks($pickgames);

        // $user_totals = $this->getUserTotals($games, $picks, $users);
        // $weekly_winners = $this->getWeeklyWinners($user_totals);
        // $this->saveWeeklyWinners($weekly_winners, $user_totals);
        $winnersArray = $this->saveWeeklyWinners();
// dd($winnersArray);
        // $stats = array();
        // $stats = $redis->hgetall('stats');

        // return view('pages.picks.showAllPicks', compact('picks', 'games', 'clubs', 'users', 'user_totals', 'weekly_winners', 'chosen_week_number'));
        return view('pages.picks.showAllPicks', compact('picks', 'games', 'clubs', 'users', 'redisArray', 'winnersArray', 'chosen_week_number'));
    }

    /**
     *  Create calculation record of this week's winners
     *
     * @return \Illuminate\Http\Response
     */
    public function create($week_id, $correct, $json)
    {
        // $json = '{"users": ["82", "132"]}'
        Calculation::insert(array(
            'week_id' => $week_id,
            'correct' => $correct,
            'winning_users' => $json,
            'created_at' => date("Y-m-d H:i:s"),
       ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     *  Show rankings table
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chosen_week_id = Redis::hget('redis_session', 'chosen_week_id');

        $users = DB::table('users')->select('id', 'name')->orderBy('id')->get(); 
        $winners = DB::table('calculations')->select('winning_users', 'week_id', 'correct')->get();

        // expand json field winners into tempArray
        $i = 0;
        $tempArray = array();
        foreach ($winners as $weekArray) {
            $week_winners = json_decode($weekArray->winning_users, true);
            $win_users = explode("|", $week_winners['users']);
            foreach ($win_users as $win) {
                    $tempArray[$i]['user_id'] = $win;
                    $tempArray[$i]['week_id'] = $weekArray->week_id;
                    $tempArray[$i]['correct'] = $weekArray->correct;
                    $i++;
            } 
        }

        // sort array to user_id
        if ( 1 < count ($tempArray)) {
            usort($tempArray, function($a, $b) {
                return $a['user_id'] <=> $b['user_id'];
            });
        }

        // summarize weekly winners
        $i = 0;
        $winnerArray = array();
        foreach ($tempArray as $temp) {
            if (count($winnerArray) == 0) {
                $winnerArray[$i]['user_id'] = $temp['user_id'];
                $winnerArray[$i]['thisWeekCorrect'] = 0;
                $winnerArray[$i]['seasonCorrect'] = 0;
                $winnerArray[$i]['lastWeeksWinner'] = 0;
            }
            if ($winnerArray[$i]['user_id'] != $temp['user_id']) {
                $i++;
                $winnerArray[$i]['user_id'] = $temp['user_id'];
            }
            
            if ($winnerArray[$i]['user_id'] == $temp['user_id']) {
                //  this week number of correct picks
                if ( !isset($winnerArray[$i]['thisWeekCorrect'])) {
                    $winnerArray[$i]['thisWeekCorrect'] = 0;
                }
                if ($temp['week_id'] == $chosen_week_id) {
                    $winnerArray[$i]['thisWeekCorrect'] = $temp['correct'];
                }
                //  total number of correct for season
                if ( !isset($winnerArray[$i]['seasonCorrect'])) {
                    $winnerArray[$i]['seasonCorrect'] = 0;
                }
                $winnerArray[$i]['seasonCorrect'] = $winnerArray[$i]['seasonCorrect'] + $temp['correct'];
                //  last week's winner user_id
                if ( !isset($winnerArray[$i]['lastWeeksWinner'])) {
                    $winnerArray[$i]['lastWeeksWinner'] = 0;
                }
                if ($chosen_week_id > 10 && $temp['week_id'] == $chosen_week_id - 10) {
                    $winnerArray[$i]['lastWeeksWinner'] = 1;
                } 
                
            }
        }

        // sort winnerArray highest total correct
        if ( 1 < count ($winnerArray)) {
            usort($winnerArray, function($a, $b) {
                return $b['seasonCorrect'] <=> $a['seasonCorrect'];
            });
        }
// dd($winnerArray);

        return view('pages.calculations.show', compact('users', 'winnerArray'));


        /*
        *  access to the json field of winning_users
        /*
        $win = Calculation::where('week_id', Redis::hget('redis_session', 'chosen_week_id'))
            ->select('winning_users')
                ->first();

        $winningUsers = json_decode($win['winning_users'], true);
        $users = explode("|", $winningUsers['users']);
        dd($users);
        */
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

    /**
    *  saveWeeklyWinners - save json array to DB
    *
    * @param 
    * @return \Illuminate\Http\Response
    */  
    function saveWeeklyWinners() {
        $x = 0;
        $json = '';
        $totscount = 0;
        $redis = Redis::connection();
        if ($redis->exists('totscount')) {
            $totscount = $redis->hget('totscount', 'count');
        }

        $redisArray = array();
        for ($i=0; $i < $totscount; $i++) {
            if ($redis->exists('tots:'.$i)) {
                $redisArray[] = $redis->hgetall('tots:'.$i);
            }
        }

        if ($redis->exists('winners')) {
            $winnersArray[] = $redis->hgetall('winners');
            foreach ($winnersArray as $winner) {
                $json .=$winner['user_id'].'|';
            }
        } else {
            $winnersArray[] = null;
        }

        $json = substr($json, 0, strlen($json)-1);
        $current_winners = 0;
        $current_winners = Calculation::where('week_id', Redis::hget('redis_session', 'chosen_week_id'))->first();
// echo "<pre>";
// print_r($redisArray);
// print_r($winnersArray);
// echo "</pre>";
// echo $current_winners;
// echo "</br>";
// echo $json;

        if(count($current_winners) < 1) {
                if ($json == '') {
                } else {
                    // create new json record
                    $json = '{users: '.substr($json, 1, strlen($json)).'}';
                    $this->create(Redis::hget('redis_session', 'chosen_week_id'), $redisArray['correct'], $json);
                }
            } else {
                // update json field
                Calculation::where('week_id', Redis::hget('redis_session', 'chosen_week_id'))
                    ->update(['winning_users->users' => $json]);
             } 
// dd($json);
        return $winnersArray;
    }


    function summarizeCorrectWeeklyPicks($pickgames) 
    {
        $redis = Redis::connection();
        $i = 0;

        // delete prior redis totals
        while ($redis->exists('tots:'.$i)) {
            $redis->hdel('tots:'.$i, 'user_id', 'user', 'correct', 'points', 'diff');
            $i++;
        }

        if ($redis->exists('stats')) {
            $redis->hdel('stats', 'winningDiff', 'plusDiff', 'minusDiff', 'mostCorrect');
        }

        if ($redis->exists('totscount')) {
            $redis->hdel('totscount', 'count');
        }
        //  end redis delete

        // cycle thru pick input to total up choices
        $u = 0;   $first = 0;  $user_id = 0;  $correct = 0;  $points = 0;  $diff = 0;
        foreach ($pickgames as $pick) {
            if ($first == 0) {
                $first = 1;
                $user_id = $pick->user_id;
            } 

            //  calculate total number of correct choices
            if ($user_id != $pick->user_id) {
                $redis->hmset('tots:'.$u, 'user_id', $user_id, 'correct', $correct, 'points', $points, 'diff', $diff);
                $user_id = $pick->user_id;
                $points = 0;
                $correct = 0;
                $diff = 0;
                $u++;
            }
            
            if ($pick->tiebreaker == 1 && $pick->points > 0) {
                $diff = ($pick->home_score + $pick->away_score) - $pick->points;
            } else {
                $diff = null;
            }
            if (($pick->away_score > $pick->home_score && $pick->club_id == $pick->awayteam_id) || ($pick->home_score > $pick->away_score && $pick->club_id == $pick->hometeam_id)) {
                $correct++;
            } 
            $points = $points + $pick->points;           
        }
        $redis->hmset('tots:'.$u, 'user_id', $user_id, 'correct', $correct, 'points', $points, 'diff', $diff);
        $redis->hmset('totscount', 'count', $u);
        //  end of total correct

        // get totals in redisArray
        $redisArray = array();
        for ($i=0; $i <= $u; $i++) {
            if ($redis->exists('tots:'.$i)) {
                $redisArray[] = $redis->hgetall('tots:'.$i);
            }
        }

// dd($redisArray);   
        //  find users with the most correct picks     
        $plusDiff = 100;    $minusDiff = -100;   $correctArray = array();  $i=0;
        $totalCorrect = max(array_column($redisArray, 'correct'));
        foreach ($redisArray as $redisItem) {
            if ($redisItem['correct'] == $totalCorrect) {
                $correctArray[$i]['user_id'] = $redisItem['user_id'];
                $correctArray[$i]['diff'] = $redisItem['diff'];
                $i++;
            }
        }
      
        //  if more than one user with most correct, find closest points
        if (count($correctArray) > 1) {
            foreach ($correctArray as $correctItem) {
                if ($correctItem['diff'] != null && $correctItem['diff'] <= -1 && $correctItem['diff']  > $minusDiff) {
                    $minusDiff = $correctItem['diff'];
                }
                if ($correctItem['diff'] != null && $correctItem['diff'] > 0 && $correctItem['diff']  < $plusDiff) {
                    $plusDiff = $correctItem['diff'];
                }
            }
        }
        
        //  determine if closest total points is positive (didn't go over) or negative
        if (isset($plusDiff)) {
            $winningDiff = $plusDiff;
        } elseif (isset($minusDiff)) {
            $winningDiff = $minusDiff;
        } else {
            $winningDiff = 0;
        }

        //  save winning difference and most correct picks in redis
        $redis->hmset('stats', 'winningDiff', $winningDiff, 'mostCorrect', $totalCorrect);
        $stats = array();
        $stats = $redis->hgetall('stats');

        //  save the winners user_id in redis
        if (count($correctArray) > 1) {
            foreach ($correctArray as $correctItem) {
                if ($correctItem['diff'] == $winningDiff) {
                    $redis->hmset('winners', 'user_id', $correctItem['user_id']);
                }
            }
        }

// echo "<pre>";
// print_r($stats);
// echo "</br>";
// print_r($correctArray);
// echo "</br>";
// print_r($redisArray);
// echo "</pre>";
// dd('here');
        return $redisArray;
    }
}
