<?php

namespace App\Http\Controllers;

use App\Club;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Requests\ClubRequest;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $clubs = Club::all();

        return view('pages.clubs.index', compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.clubs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ClubRequest $request)
    {
        $input = $request->all();
        $input['created_at'] = Carbon::now();

        Club::create($input);

        return redirect('clubs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $club = Club::findOrFail($id);

        return view('pages.clubs.show', compact('club'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $club = Club::findOrFail($id);

        return view('pages.clubs.edit', compact('club'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Redirect
     */
    public function update($id, ClubRequest $request)
    {
        $club = Club::findOrFail($id);

        $club->update($request->all());

        return redirect('clubs');
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
