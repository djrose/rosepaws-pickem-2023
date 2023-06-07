<div class="form-group">
  {{-- {!! Form::label('goal_id', 'Goal:') !!}
  {!! Form::select('goal_id', ['1' => 'Reduce churn to 5% by 2018'], null, ['class' => 'form-control', 'placeholder' => 'Select a goal']) !!}<br /> --}}
  {!! Form::label('team', 'Club/Team Name (example: Steelers):') !!}
  {!! Form::text('team', null, ['class' => 'form-control']) !!}<br />
  {!! Form::label('initials', 'Club/Team Initials (example: PIT):') !!}
  {!! Form::text('initials', null, ['class' => 'form-control']) !!}<br />
  {!! Form::label('city', 'Club/Team City (example: Pittsburgh):') !!}
  {!! Form::text('city', null, ['class' => 'form-control']) !!}<br />

  {!! Form::hidden('user_id', Auth::user()->id) !!}
</div>

<div class="form-group">
  {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
