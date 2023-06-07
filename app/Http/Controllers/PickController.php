<?php

namespace App\Http\Controllers;

use DB;
use App\Club;
use App\Game;
use App\Pick;
use App\User;
use App\Week;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Redirect;

class PickController extends Controller
{
    /**
     *   Show all picks for this week's games...  pickem.app/picks
     *
     * @param  int  $chosen_week as Redis variable
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Redirect::route('calculations.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($input)
    {
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
        $chosen_user_id = Redis::hget('redis_session', 'chosen_user_id');
        if ($request->game != null) {
            $input = $request->all();


// dd($request->game);
        // if ( count($input['game']) > 0 ) {
// dd($input);
            $pick['user_id'] = $input['user_id'];
            $pick['created_at'] = Carbon::now();

            foreach ($input['game'] as $game_id => $club_id)
            {
                $pick['game_id'] = $game_id;
                $pick['club_id'] = intval($club_id);
                if ($input['tiebreaker'] == $game_id) {
                    $pick['points'] = $input['points'];
                } else {
                    $pick['points'] = null;
                }
                
                Pick::updateOrCreate(['user_id' => $pick['user_id'], 'game_id' => $pick['game_id']], 
                    ['user_id' => $pick['user_id'], 
                     'game_id' => $pick['game_id'],
                     'club_id' => $pick['club_id'],
                     'points'  => $pick['points']
                    ]);
                }
        } else {
            return redirect('games');
        }

        return redirect('picks/'.$chosen_user_id);
    }


    /**
     * Display picks for current chosen user for chosen week.
     *
     * @param int chosen user_id
     * @return \Illuminate\Http\Response
     */
    public function show($chosen_week_id)
    {
        $redis_session = Redis::hgetall('redis_session');

        if (!empty($redis_session)) {
            $chosen_week_number = $redis_session['chosen_week_number'];
            $chosen_user_id = $redis_session['chosen_user_id'];
            $chosen_user_name = $redis_session['chosen_user_name'];

            $clubs = $this->getClubsArray();

            $picks = DB::table('picks')
                ->leftJoin('games', 'picks.game_id', '=', 'games.id')
                ->leftJoin('weeks', 'games.week_id', '=', 'weeks.id')
                ->orderBy('picks.game_id')
                ->select('picks.*', 'weeks.id', 'weeks.week_number',
                    'games.game_start', 'games.hometeam_id', 'games.awayteam_id', 
                    'games.home_score', 'games.away_score', 'games.tiebreaker')
                ->where([
                    ['weeks.id', '=', $chosen_week_id],
                    ['picks.user_id', '=', $chosen_user_id]
                    ])
                ->get();

            return view('pages.picks.show', compact('chosen_user_name', 'chosen_week_number', 'picks', 'clubs'));

        } else {
            return view('home');
        }
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
