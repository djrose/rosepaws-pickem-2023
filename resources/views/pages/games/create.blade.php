@extends('layouts.master')

@section('content')
<home :user="user" inline-template>
    <div class="spark-screen container">
        <div class="row">
          <div class="col-md-4">
          </div>
          
          <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Game</div>

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <div class="panel-body">                            
                       {!! Form::open(['url' => 'games']) !!}
                          @include ('layouts.partials.forms.game.form-create-markup', ['submitButtonText' => 'Add Game'])
                      {!! Form::close() !!}

                      @include ('errors.list')
                    </div>
                </div>
          </div>
      </div>
  </div>
</home>
@endsection