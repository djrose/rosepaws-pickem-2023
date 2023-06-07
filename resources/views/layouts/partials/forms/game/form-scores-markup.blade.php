<h3>Games</h3>
@foreach ($games as $game)
    <div class="row">
        <div class="col-md-3">
            {!! Form::label('game['.$game->game_id.'][away_score]', $club[$game->awayteam_id]['initials'].' '.$club[$game->awayteam_id]['teamname']) !!}
        </div>
        <div class="col-md-3">
            {!! Form::text('game['.$game->game_id.'][away_score]', $game->away_score, ['class' => 'text-center']) !!}
        </div>
        <div class="col-md-3">
            {!! Form::label('game['.$game->game_id.'][home_score]',  $club[$game->hometeam_id]['initials'].' '.$club[$game->hometeam_id]['teamname']) !!}
        </div>
        <div class="col-md-3">
            {!! Form::text('game['.$game->game_id.'][home_score]', $game->home_score, ['class' => 'text-center']) !!}
        </div>

        {!! Form::hidden('game['.$game->game_id.'][game_id]', $game->game_id) !!}
        {!! Form::hidden('game['.$game->game_id.'][awayteam_id]', $game->awayteam_id) !!}
        {!! Form::hidden('game['.$game->game_id.'][hometeam_id]', $game->hometeam_id) !!}
    </div>
@endforeach 

    <div class="row">
        <div class="col-md-12">
            {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control col-center']) !!}
        </div>
    </div>