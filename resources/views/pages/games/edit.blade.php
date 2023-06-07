@extends('layouts.master')

@section('content')
<home :user="user" inline-template>
  <div class="spark-screen container">
      <div class="row">
          <div class="col-md-8 col-center">
                <div class="panel panel-default">
                    <div class="panel-heading">Update Scores</div>

                    <div class="panel-body">
                        {!! Form::model($game, ['method' => 'PATCH', 'action' => ['GameController@update', $id]]) !!}
                            @include ('layouts.partials.forms.game.form-markup', ['submitButtonText' => 'Update Score'])
                        {!! Form::close() !!}

                        @include ('errors.list')
                    </div>
                </div>
                <a href="{{ route('games.show', array($chosen_week_id)) }}"><button class="btn btn-secondary">Schedule<i class="fa fa-chevron-circle-right"></i></button></a>
            </div>
        </div>
    </div>
</home>
@endsection
