
<div class="form-group">
  <div class="row">
    <div class="col-md-4">
      {!! Form::label('awayteam_id', 'Visitors') !!}
      {!! Form::select('awayteam_id', $clubs, null, ['class' => 'form-control']) !!}
    </div>

    <div class="col-md-4">
      {!! Form::label('hometeam_id', 'Home') !!}
      {!! Form::select('hometeam_id', $clubs, null, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      {!! Form::label('gamedate', 'Date') !!} <br />
      {!! Form::date('gamedate', null, ['class' => 'form-control', 'placeholder' => $date_placeholder, 'id' =>'tbDate']) !!}
    </div>

    <div class="col-md-4">
        {!! Form::label('gametime', 'Start Time') !!} <br />
        {!! Form::time('gametime', null, ['class' => 'form-control', 'placeholder' => $time_placeholder, 'id' => tbToSetFocus]) !!}
        {!! 'Enter as ET as hh:ii a' !!} <br />
    </div>

    <div class="col-md-4">
      {!! Form::label('chosen_week_id', 'Week#') !!}<br />
      {!! Form::select('chosen_week_id', $weeks, $chosen_week_id, ['class' => 'form-control']) !!}
    </div>
  </div>
   <!-- {!! Form::hidden('user_id', Auth::user()->id) !!} -->
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

    <!-- show prior games entered for chosen week -->
  @foreach ($games as $game)
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6">        
            {!! $clubs[$game->awayteam_id]."  vs  ".$clubs[$game->hometeam_id] !!}
          </div>
          <div class="col-md-6">
            {!! date_format(date_create($game->game_start),'m/d/Y h:ia').'&nbsp;&nbsp;&nbsp;Wk#: '.$weeks[$game->week_id] !!}
          </div>
        </div>
      </div>
    </div>
  @endforeach

<script type="text/javascript">
    $(function() {
        $( "#datepicker" ).datepicker();
    });
</script>