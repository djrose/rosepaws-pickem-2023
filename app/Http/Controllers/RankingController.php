<?php

namespace App\Http\Controllers;

use App\Ranking;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rankings = Ranking::all();
        return view('rankings.index', compact('rankings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

        $ranking = App\Ranking::updateOrCreate(
            [   'user_id' => '',
                'week_id' => '',
                'week_number' => '',
                'correct' => 0,
                'diff' => 0,
                'points' => 0,
                'created_at' => date("Y-m-d H:i:s")
            ]);

        // DB::unprepared('SET @@auto_increment_increment=10;');
        // DB::unprepared('SET @@auto_increment_offset=2;');

        // //insert some dummy records
        // DB::table('rankings')->insert(array(
        //   array(
        //     'user_id' => '2',
        //     'week_id' => '2',
        //     'week_number' => '112',
        //     'correct' => 0,
        //     'diff' => 0,
        //     'points' => 0,
        //     'created_at' => date("Y-m-d H:i:s"),
        //   )
        // ));

        // $result = UserRating::where('rated_on_id', '=', $userId)->where('status', '=', 0)->count();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ranking  $ranking
     * @return \Illuminate\Http\Response
     */
    public function show(Ranking $ranking)
    {
        $ranking = Ranking::find($ranking);
        return view('rankings.blade.show', compact('ranking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ranking  $ranking
     * @return \Illuminate\Http\Response
     */
    public function edit(Ranking $ranking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ranking  $ranking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ranking $ranking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ranking  $ranking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ranking $ranking)
    {
        //
    }
}
