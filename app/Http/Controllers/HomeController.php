<?php

namespace App\Http\Controllers;

use App\Week;
use App\Season;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('subscribed');
    }

    /**
     * Determine current week and save to Redis
     *
     * @return Response
     */
    public function index() {
        // call function to figure out current week & store as a Session variable in Redis
        $weeks = Week::select('*')->orderBy('start_timestamp')->get();
        $end_week = Week::select('*')->orderBy('end_timestamp', 'desc')->first();

        foreach ($weeks as $week) {
            $lastWeek = (new Carbon($week->end_timestamp))->subWeek(1);
            if (strtotime(Carbon::now('America/Phoenix')) > strtotime($lastWeek) &&
                strtotime(Carbon::now('America/Phoenix')) < strtotime($week->end_timestamp)) { 
                break;
            } elseif (strtotime(Carbon::now('America/Phoenix')) > strtotime($end_week->end_timestamp)) {
                $week =Week::select('*')->orderBy('start_timestamp', 'desc')->first();
            }       
        }
        $redis = Redis::connection();
        if ($redis->exists('redis_session')) {
            $redis->hdel('chosen_season_id', 'chosen_week_id', 'current_week_id', 'chosen_week_number', 'chosen_user_id', 'chosen_user_name');
        }


       $redis_array = array(
            'chosen_week_id' => $week['id'],
            'current_week_id' => $week['id'],
            'chosen_week_number' => $week['week_number'],
            'chosen_user_id'     => user()->id,
            'chosen_user_name'   => user()->name,
            'chosen_season_id'   => $week['season_id']
        );
        $redis->hmset('redis_session', $redis_array);
        $redis_session = $redis->hgetall('redis_session');

        $chosen_week_id = $redis_session['chosen_week_id'];
        $chosen_user_id = $redis_session['chosen_user_id'];
        $chosen_season_id = $redis_session['chosen_season_id'];
//  var_dump($redis_session);
//  dd("here");
        $weeks = Week::where('season_id', $chosen_season_id)->orderBy('week_number')->pluck('week_number', 'id');
 
        return view('home', compact('weeks', 'chosen_week_id', 'chosen_user_id'));
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function show() {

    }
}
