    <div class="row">
    </div>

    <div class="row">
      <div class="col-md-12">
        Week #
      </div>
    </div>

    <div class="row">
    <div class="col-md-12">
      <div class="col-md-3">
        Visitors
      </div>
      <div class="col-md-3">
        Home
      </div>
      <div class="col-md-3">
          Game Start
      </div>
      <div class="col-md-3">
      </div>
    </div>
    </div>
<!-- {{ dd($games) }}  -->

    @foreach ($games as $game)
      <div class="row">
      <div class="col-md-12">
        <div class="col-md-3">
          {{ $game->awayteam_id }}
        </div>
        <div class="col-md-3">
          {{ $game->hometeam_id }}
        </div>
        <div class="col-md-3">
            {{ $game->game_start }}
        </div>
        <div class="col-md-3">
            {{ $game->week_id }}
        </div>
      </div>
      </div>
    @endforeach