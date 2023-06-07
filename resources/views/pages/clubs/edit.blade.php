@extends('layouts.master')

@section('content')
<home :user="user" inline-template>
  <div class="spark-screen container">
      <div class="row">
          <div class="col-md-8 col-center">
                <div class="panel panel-default">
                    <div class="panel-heading">Update: {!! $club->id !!}</div>

                    <div class="panel-body">
                        {!! Form::model($club, ['method' => 'PATCH', 'action' => ['ClubController@update', $club->id]]) !!}
                            @include ('layouts.partials.forms.club.form-markup', ['submitButtonText' => 'Update Club'])
                        {!! Form::close() !!}

                        @include ('errors.list')
                    </div>
                </div>
            </div>
        </div>
    </div>
</home>
@endsection
