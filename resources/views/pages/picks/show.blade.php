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
                @if ( !empty ( $picks ) && (!$picks->isEmpty()) )
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ 'Picks - week #'.$chosen_week_number }}
                    </div>

                    <div class="panel-body">
                        {!! Form::open(['url' => 'picks']) !!}

                            <div class="row">
                                <div class="col-md-12">
                                	{{ 'User: '.Redis::hget('redis_session', 'chosen_user_name') }}
                               </div>
                            </div>

                            <div class="row"><div class="col-md-12">{{ '&nbsp;&nbsp;&nbsp;' }}</div></div>

                            @foreach ($picks as $pick)
                            	<div class="row">
                            		<div class="col-md-4">
                            			<p><a href="{{ url('/picks', $pick->id) }}">{{ 'Game: '.$pick->game_id."  ".Carbon\Carbon::parse($pick->game_start)->format('m-d-Y h:i a') }}</a></p>
                            		</div>
                            		<div class="col-md-4">
                                        {{ $clubs[$pick->awayteam_id]['teamname'] . " vs " .
                                         $clubs[$pick->hometeam_id]['teamname'] }}
                            		</div>

                            		<div class="col-md-4">
                                    <td>{{ $clubs[$pick->club_id]['initials'] }}</td>
                            		</div>
                            	</div>

                                <div class="row">
                                    @if ($pick->points != NULL)
                                        <div class="col-md-offset-4 col-md-4 text-center">
                                        {{ 'Tiebreaker Points: '.$pick->points }}
                                        </div>
                                    @endif
                                </div>
                            @endforeach

                            @include ('errors.list')
                        {!! Form::close() !!}
                    </div>
                </div>
                @endif

                <div class="row">
                    <div class="col-md-3">
                        <a href="{{ url('./home') }}"><button class="btn btn-secondary">Home <i class="fa fa-chevron-circle-right"></i></button></a>
                    </div>

                    <div class="col-md-3">
                        <a href="{{ route('games.index') }}"><button class="btn btn-secondary">Schedule <i class="fa fa-chevron-circle-right"></i></button></a>
                    </div>

                    <div class="col-md-3">
                        <a href="{{ route('picks.index') }}"><button class="btn btn-secondary">Show All Picks <i class="fa fa-chevron-circle-right"></i></button></a>
                    </div>

                    <div class="col-md-3">
                        <a href="{{ route('calculations.show', Redis::hget('redis_session', 'chosen_week_id') ) }}"><button class="btn btn-secondary">Show Rankings <i class="fa fa-chevron-circle-right"></i></button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</home>
@endsection

