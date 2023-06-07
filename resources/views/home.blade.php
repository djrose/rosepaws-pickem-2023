@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="container">
        <!-- Application Dashboard -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-7">
                                    Your application's dashboard.
                                </div>

                                <div class="col-md-5 form-group">
                                        <label for="selected_week_id">
                                        {!! Form::select('selected_week_id', $weeks, $chosen_week_id, ['class' => 'form-control', 'id' => 'wk']) !!}
                                        </label>
                                        <a href="{{ route('weeks.update', $chosen_week_id) }}"><button class="btn btn-secondary">Change wk <i class="fa fa-chevron-circle-right"></i></button></a>
                                </div>
                                
                            </div>
                            </br>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <a href="{{ route('games.show', $chosen_week_id) }}"><button class="btn btn-secondary">Schedule <i class="fa fa-chevron-circle-right"></i></button></a>
                                </div>

                                <div class="col-md-3">
                                    <a href="{{ route('picks.show', $chosen_week_id) }}"><button class="btn btn-secondary">Show My Picks <i class="fa fa-chevron-circle-right"></i></button></a>
                                </div>

                                <div class="col-md-3">
                                    <a href="{{ route('picks.index') }}"><button class="btn btn-secondary">Show All Picks <i class="fa fa-chevron-circle-right"></i></button></a>
                                </div>

                                <div class="col-md-3">
                                    <a href="{{ route('games.edit', $chosen_week_id) }}"><button class="btn btn-secondary">Edit Scores <i class="fa fa-chevron-circle-right"></i></button></a>
                                </div>
                            </div>

                            <br />
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="{{ route('calculations.show', $chosen_week_id) }}"><button class="btn btn-secondary">Show Rankings <i class="fa fa-chevron-circle-right"></i></button></a>
                                </div>

                                <div class="col-md-3">
                                    <a href="{{ route('games.create') }}"><button class="btn btn-secondary">Enter Games <i class="fa fa-chevron-circle-right"></i></button></a>
                                </div>

                                <div class="col-md-3">
                                    <a href="{{ route('clubs.index') }}"><button class="btn btn-secondary">Clubs <i class="fa fa-chevron-circle-right"></i></button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</home>
@endsection
