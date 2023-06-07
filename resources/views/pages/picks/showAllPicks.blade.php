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
                    <div class="panel-heading">
                        {{ 'Picks - week #'.$chosen_week_number }}
                    </div>
                    <div class="panel-body">

                        {!! Form::open(['url' => 'users']) !!}
                            @include('layouts.partials.pick.partial-showAllPicks')
     
                            @include ('errors.list')
                        {!! Form::close() !!}
                    </div>
                </div>
                @endif

                <div class="row">
                    <div class="col-md-4">
                        <a href="home"><button class="btn btn-secondary">Home <i class="fa fa-chevron-circle-right"></i></button></a>
                    </div>

                    <div class="col-md-4">
                        <a href="{{ route('games.index') }}"><button class="btn btn-secondary">Schedule <i class="fa fa-chevron-circle-right"></i></button></a>
                    </div>

                    <div class="col-md-4">
                        <a href="{{ route('games.edit', array($chosen_week_number)) }}"><button class="btn btn-secondary">Edit Scores <i class="fa fa-chevron-circle-right"></i></button></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</home>
@endsection