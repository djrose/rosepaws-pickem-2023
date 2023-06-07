@extends('layouts.master')

@section('content')
<home :user="user" inline-template>
  <div class="spark-screen container">
      <div class="row">
          <div class="col-md-4">
          </div>

          <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Club</div>

                    <div class="panel-body">
                        {!! Form::open(['url' => 'clubs']) !!}
                            @include ('layouts.partials.forms.club.form-markup', ['submitButtonText' => 'Add Club'])
                        {!! Form::close() !!}

                        @include ('errors.list')
                    </div>
                </div>
            </div>
        </div>
    </div>
</home>
@endsection
