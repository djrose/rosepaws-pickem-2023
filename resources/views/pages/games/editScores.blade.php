@extends('layouts.master')

@section('content')
<home :user="user" inline-template>
  <div class="spark-screen container">
      <div class="row">
          <div class="col-md-8 col-center">
                <div class="panel panel-default">
                    <div class="panel-heading">Update Scores - Week #{{ $chosen_week_number  }}</div>
 
                    <div class="panel-body">
                        {!! Form::model($games, ['method' => 'PATCH', 'action' => ['GameController@update', $chosen_week_id]]) !!}
                            @include ('layouts.partials.forms.game.form-scores-markup', ['submitButtonText' => 'Update Score'])
                        {!! Form::close() !!}   

                        @include ('errors.list')
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <a href="{{ route('games.show', $chosen_week_id) }}"><button class="btn btn-secondary">Schedule <i class="fa fa-chevron-circle-right"></i></button></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</home>
@endsection

@section('footer-scripts-specific')
    <script language='javascript' type='text/javascript'>
        $(document).ready(function () {
            var firstInput = $('form').find('type="text"').filter(':visible:first');
        if (firstInput != null) {
            if (firstInput != null) {
                firstInput.focus();
            }
        });
    </script>
@endsection