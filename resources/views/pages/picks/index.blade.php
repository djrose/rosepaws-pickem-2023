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
                @if ( !empty ( $games ) && (!$games->isEmpty()) )
                <div class="panel panel-default">
                    <div class="panel-heading">Games</div>

                    <div class="panel-body">
                        {!! Form::open(['url' => 'games']) !!}
                            @foreach ($games as $game)
                                <div class="row">
                                    <div class="col-md-6 schedule">
                                        {!! Form::radio($game->id, $game->awayteam_id, false, array('id'=>'away'.$game->id, 'class'=>'schedule-button'))!!}
                                        {!! Form::label('away'.$game->id, $clubs[$game->awayteam_id]['city'].' '.$clubs[$game->awayteam_id]['teamname'], array('class'=>'schedule-label')) !!}
                                    </div>
                                    <div class="col-md-6 schedule">
                                        {!! Form::radio($game->id, $game->hometeam_id, false, array('id'=>'home'.$game->id, 'class'=>'schedule-button'))!!}
                                        {!! Form::label('home'.$game->id, $clubs[$game->hometeam_id]['city'].' '.$clubs[$game->hometeam_id]['teamname'], array('class'=>'schedule-label')) !!}
                                    </div>
                                </div> 
                            @endforeach

                            @include ('errors.list')
                        {!! Form::close() !!}
                    </div>
                </div>
                @endif

                <a href="{{ route('games.index') }}"><button class="btn btn-secondary">Games <i class="fa fa-chevron-circle-right"></i></button></a>
            </div>
        </div>
    </div>
</home>
@endsection
