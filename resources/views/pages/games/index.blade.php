@extends('layouts.master')

@section('content')
<home :user="user" inline-template>
    <div class="spark-screen container">
        <div class="row">
            <div class="col-md-8">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
            </div>

            <div class="col-md-8">
                @if ( !empty ( $games ) )
                <div class="panel panel-default">
                    <div class="panel-heading">Games</div>

                    <div class="panel-body">
                         {!! Form::open(array('action' => array('PickController@store', $chosen_user_id))) !!}

                            @foreach ($games as $game)
                                <div class="row">
                                    <div class="col-md-12 text-center game-date">
                                        {{ 'Game Time: '.$game['game_start'] }}
                                        {{ 'Cutoff time: '.Carbon\Carbon::parse($game['cutofftime']) }}
                                        @if (Carbon\Carbon::now(new DateTimeZone('America/Phoenix')) > $game['cutofftime'])
                                            {{ '** LOCKED **'}}
                                        @endif
                                    </div>
                                </div>
                               
                                <div class="row">    
                                    <div class="col-md-6 pick-style">
                                        {!! Form::label('away'.$game['id'], $clubs[$game['awayteam_id']]['city'].' '.$clubs[$game['awayteam_id']]['teamname'], array('class' => 'col-lg-12 control-label pick-label')) !!}

                                        @if ( $game['cutofftime'] > Carbon\Carbon::now() )
                                            {!! Form::radio('game['.$game['id'].']', $game['awayteam_id'], false, array('id'=>'away'.$game['id'], 'class'=>'pick-radio'))!!}
                                        @endif
                                    </div>

                                    <div class="col-md-6 pick-style">
                                        <span>
                                            {!! Form::label('home'.$game['id'], $clubs[$game['hometeam_id']]['city'].' '.$clubs[$game['hometeam_id']]['teamname'], array('class'=>'col-lg-12 control-label pick-label')) !!}

                                            @if ( $game['cutofftime'] > Carbon\Carbon::now() )
                                                {!! Form::radio('game['.$game['id'].']', $game['hometeam_id'], false, array('id'=>'home'.$game['id'], 'class'=>'pick-radio'))!!}
                                            @endif
                                        </span>
                                    </div>
                                </div>

                                <div class="row">
                                    @if ($game['tiebreaker'] == 1)
                                        <div class="col-md-offset-4 col-md-4 text-center">
                                        {!! Form::hidden('tiebreaker', $game['id']) !!}
                                        {{ 'Enter Tiebreaker Points here: ' }}
                                            {!! Form::text('points', '0', array('class' => 'pick-text')) !!}
                                        </div>
                                    @endif
                                </div>
                            @endforeach

                            <div class="form-group">
                                {!! Form::hidden('user_id', Auth::user()->id) !!}
                                {!! Form::submit('Save My Picks', ['class' => 'btn btn-primary form-control']) !!}
                            </div>

                            @include ('errors.list')
                        {!! Form::close() !!}
                    </div>
                </div>
                @endif

                <div class="row">
                    <div class="col-md-3">
                        <a href="home"><button class="btn btn-secondary">Home <i class="fa fa-chevron-circle-right"></i></button></a>
                    </div>

                    <div class="col-md-3">
                        <a href="{{ url('/picks/'.$chosen_user_id) }}"><button class="btn btn-secondary">My Picks <i class="fa fa-chevron-circle-right"></i></button></a>
                    </div>

                    <div class="col-md-3">
                        <a href="{{ route('picks.index') }}"><button class="btn btn-secondary">Show All Picks <i class="fa fa-chevron-circle-right"></i></button></a>
                    </div>
dd($chosen_week_id);
                    <div class="col-md-3">
                        <a href="{{ route('calculations.show', Redis::hget('redis_session', 'chosen_week_id') ) }}"><button class="btn btn-secondary">Show Rankings <i class="fa fa-chevron-circle-right"></i></button></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</home>
@endsection
