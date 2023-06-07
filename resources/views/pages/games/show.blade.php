@extends('layouts.master')

@section('specific-styles')
<style>
.text-primary { color: #325D88 !important; }
.text-secondary { color: #8E8C84; }
.text-success { color: #93C54B; }
.text-info { color: #29ABE0; }
.text-warning { color: #F47C3C; }
.text-danger { color: #d9534f; }
.text-light { color: #F8F5F0; }
.text-dark { color: #3E3F3A; }
.btn-team {
    padding: 50px;
    opacity: 0.4;
}
.btn.active {
    opacity: 1;
}

.overlay {
  position: absolute;
  top: 0;
  left: 0px;
  right: 0px;
  margin: 0 15px;
  /* width: 100%; */
  height: 100%;
  z-index: 10;
  background-color: rgba(0,0,0,0.5); /*dim the background*/
}
.overlay h4 {
    color: #fff;
    display: block;
    margin-top: 40px;
    text-align: center;
}

    
.btn-bal { background: url('/img/bal_texture.jpg') right center; }
    .btn.active.btn-bal { background: url('/img/bal_texture.jpg') center center; }
.team-bal {
    background-color: #38224e;
    color: #c69d35;
}
.btn-cin { background: url('/img/cin_texture.jpg') right center; }
    .btn.active.btn-cin { background: url('/img/cin_texture.jpg') center center; }
.team-cin {
    background-color: #f04e23;
    color: #000;
}
.btn-cle { background: url('/img/cle_texture.jpg') right center; }
    .btn.active.btn-cle { background: url('/img/cle_texture.jpg') center center; }
.team-cle {
    background-color: #f26522;
    color: #341d08;
}
.btn-pit { background: url('/img/pit_texture.jpg') right center; }
    .btn.active.btn-pit { background: url('/img/pit_texture.jpg') center center; }
.team-pit {
    background-color: #000;
    color: #fed219;
}

.btn-buf { background: url('/img/buf_texture.jpg') right center; }
    .btn.active.btn-buf { background: url('/img/buf_texture.jpg') center center; }
.team-buf {
    background-color: #21415a;
    color: #dc3b41;
}
.btn-mia { background: url('/img/mia_texture.jpg') right center; }
    .btn.active.btn-mia { background: url('/img/mia_texture.jpg') center center; }
.team-mia {
    background-color: #016366;
    color: #f94f14;
}
.btn-ne { background: url('/img/ne_texture.jpg') right center; }
    .btn.active.btn-ne { background: url('/img/ne_texture.jpg') center center; }
.team-ne {
    background-color: #112f55;
    color: #d0455c;
}
.btn-nyj { background: url('/img/nyj_texture.jpg') right center; }
    .btn.active.btn-nyj { background: url('/img/nyj_texture.jpg') center center; }
.team-nyj {
    background-color: #41816c;
    color: #fff;
}

.btn-hou { background: url('/img/hou_texture.jpg') right center; }
    .btn.active.btn-hou { background: url('/img/hou_texture.jpg') center center; }
.team-hou {
    background-color: #001240;
    color: #c92540;
}
.btn-ind { background: url('/img/ind_texture.jpg') right center; }
    .btn.active.btn-ind { background: url('/img/ind_texture.jpg') center center; }
.team-ind {
    background-color: #003d79;
    color: #fff;
}
.btn-jax { background: url('/img/jax_texture.jpg') right center; }
    .btn.active.btn-jax { background: url('/img/jax_texture.jpg') center center; }
.team-jax {
    background-color: #005a69;
    color: #d2aa41;
}
.btn-ten { background: url('/img/ten_texture.jpg') right center; }
    .btn.active.btn-ten { background: url('/img/ten_texture.jpg') center center; }
.team-ten {
    background-color: #3e96d5;
    color: #fff;
}

.btn-den { background: url('/img/den_texture.jpg') right center; }
    .btn.active.btn-den { background: url('/img/den_texture.jpg') center center; }
.team-den {
    background-color: #001f52;
    color: #f05523;
}
.btn-kc { background: url('/img/kc_texture.jpg') right center; }
    .btn.active.btn-kc { background: url('/img/kc_texture.jpg') center center; }
.team-kc {
    background-color: #9d0e06;
    color: #fff;
}
.btn-oak { background: url('/img/oak_texture.jpg') right center; }
    .btn.active.btn-oak { background: url('/img/oak_texture.jpg') center center; }
.team-oak {
    background-color: #000;
    color: #eaeaea;
}
.btn-lac { background: url('/img/lac_texture.jpg') right center; }
    .btn.active.btn-lac { background: url('/img/lac_texture.jpg') center center; }
.team-lac {
    background-color: #022b59;
    color: #ffc20e;
}

.btn-dal { background: url('/img/dal_texture.jpg') right center; }
    .btn.active.btn-dal { background: url('/img/dal_texture.jpg') center center; }
.team-dal {
    background-color: #00295b;
    color: #fff;
}
.btn-nyg { background: url('/img/nyg_texture.jpg') right center; }
    .btn.active.btn-nyg { background: url('/img/nyg_texture.jpg') center center; }
.team-nyg {
    background-color: #0e2c48;
    color: #fff;
}
.btn-phi { background: url('/img/phi_texture.jpg') right center; }
    .btn.active.btn-phi { background: url('/img/phi_texture.jpg') center center; }
.team-phi {
    background-color: #004a4a;
    color: #bac1c7;
}
.btn-was { background: url('/img/was_texture.jpg') right center; }
    .btn.active.btn-was { background: url('/img/was_texture.jpg') center center; }
.team-was {
    background-color: #4d1107;
    color: #ffb203;
}

.btn-chi { background: url('/img/chi_texture.jpg') right center; }
    .btn.active.btn-chi { background: url('/img/chi_texture.jpg') center center; }
.team-chi {
    background-color: #0b162a;
    color: #d84b1d;
}
.btn-det { background: url('/img/det_texture.jpg') right center; }
    .btn.active.btn-det { background: url('/img/det_texture.jpg') center center; }
.team-det {
    background-color: #006db0;
    color: #fafbfd;
}
.btn-gb { background: url('/img/gb_texture.jpg') right center; }
    .btn.active.btn-gb { background: url('/img/gb_texture.jpg') center center; }
.team-gb {
    background-color: #294038;
    color: #f2c230;
}
.btn-min { background: url('/img/min_texture.jpg') right center; }
    .btn.active.btn-min { background: url('/img/min_texture.jpg') center center; }
.team-min {
    background-color: #3a2375;
    color: #fbc040;
}

.btn-atl { background: url('/img/atl_texture.jpg') right center; }
    .btn.active.btn-atl { background: url('/img/atl_texture.jpg') center center; }
.team-atl {
    background-color: #000;
    color: #c04a5d;
}
.btn-car { background: url('/img/car_texture.jpg') right center; }
    .btn.active.btn-car { background: url('/img/car_texture.jpg') center center; }
.team-car {
    background-color: #0099d7;
    color: #000;
}
.btn-no { background: url('/img/no_texture.jpg') right center; }
    .btn.active.btn-no { background: url('/img/no_texture.jpg') center center; }
.team-no {
    background-color: #99844f;
    color: #000;
}
.btn-tb { background: url('/img/tb_texture.jpg') right center; }
    .btn.active.btn-tb { background: url('/img/tb_texture.jpg') center center; }
.team-tb {
    background-color: #c7384d;
    color: #000;
}

.btn-ari { background: url('/img/ari_texture.jpg') right center; }
    .btn.active.btn-ari { background: url('/img/ari_texture.jpg') center center; }
.team-ari {
    background-color: #b1093c;
    color: #000;
}
.btn-lar { background: url('/img/lar_texture.jpg') right center; }
    .btn.active.btn-lar { background: url('/img/lar_texture.jpg') center center; }
.team-lar {
    background-color: #061f38;
    color: #c5a679;
}
.btn-sf { background: url('/img/sf_texture.jpg') right center; }
    .btn.active.btn-sf { background: url('/img/sf_texture.jpg') center center; }
.team-sf {
    background-color: #c6001e;
    color: #000;
}
.btn-sea { background: url('/img/sea_texture.jpg') right center; }
    .btn.active.btn-sea { background: url('/img/sea_texture.jpg') center center; }
.team-sea {
    background-color: #002a5c;
    color: #b2b7bb;
}

#standings { border-radius: 4px; }
#accordionDetails h2 { margin-bottom: 0; }
#accordionDetails button { width: 100%; }

#accordionDetails th, #standings th { text-align: center; }
#standings.afc th { background: #d62027; color: #f8f9fa; }
#standings.nfc th { background: #1c3667; color: #f8f9fa; }
#accordionDetails table { background: #f8f9fa; color: #343a40; border-radius: 4px; margin-bottom: 0; }
</style>
@endsection

@section('content')
<home :user="user" inline-template>
    <div class="spark-screen container">
        <div class="row">
            <div class="col-md-8">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <table id="standings" class="table table-bordered afc">
                    <thead>
                        <tr>
                            <th colspan="8">AFC</th>
                        </tr>
                        <tr>
                            <th scope="col" colspan="2">North</th>
                            <th scope="col" colspan="2">South</th>
                            <th scope="col" colspan="2">East</th>
                            <th scope="col" colspan="2">West</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td>BAL</td>
                            <td>0-10</td>
                            <td>HOU</td>
                            <td>0-0</td>
                            <td>BUF</td>
                            <td>0-0</td>
                            <td>DEN</td>
                            <td>10-0</td>
                        </tr>
                        <tr class="">
                            <td>CIN</td>
                            <td>0-10</td>
                            <td>IND</td>
                            <td>0-0</td>
                            <td>MIA</td>
                            <td>0-0</td>
                            <td>KC</td>
                            <td>10-0</td>
                        </tr>
                    </tbody>
                </table>
                <table id="standings" class="table table-bordered nfc">
                    <thead>
                        <tr>
                            <th colspan="8">AFC</th>
                        </tr>
                        <tr>
                            <th scope="col" colspan="2">North</th>
                            <th scope="col" colspan="2">South</th>
                            <th scope="col" colspan="2">East</th>
                            <th scope="col" colspan="2">West</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td>CHI</td>
                            <td>0-10</td>
                            <td>ATL</td>
                            <td>0-0</td>
                            <td>DAL</td>
                            <td>0-0</td>
                            <td>ARI</td>
                            <td>10-0</td>
                        </tr>
                        <tr class="">
                            <td>DET</td>
                            <td>0-10</td>
                            <td>CAR</td>
                            <td>0-0</td>
                            <td>NYG</td>
                            <td>0-0</td>
                            <td>LAR</td>
                            <td>10-0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-8">
                @if ( !empty ( $games ) )
                <div class="panel panel-default">
                    <div class="panel-heading">Games - Week# {{ $chosen_week_number }}</div>

                    <div class="panel-body">
                         {!! Form::open(array('action' => array('PickController@store', $chosen_user_id))) !!}

                            @foreach ($games as $game)
                            <div class="panel panel-default">
                                <div class="panel-heading text-center game-date">
                                    {{ (DateTime::createFromFormat('Y-m-d H:i:s', $game['game_start']))->format('D, m/d/Y g:i a') }}
                                    
                                    @if (Carbon\Carbon::now(new DateTimeZone('America/Phoenix')) > $game['cutofftime'])
                                        {{ '&nbsp;&nbsp;&nbsp;** LOCKED **'}}
                                    @else
                                        {{ '&nbsp;&nbsp;&nbsp;Pick Cutoff: '.(DateTime::createFromFormat('Y-m-d H:i:s', $game['cutofftime']))->format('D, m/d/Y g:i a') }}
                                    @endif
                                </div>
                               
                                <div class="row">
                                    <div class="col-md-12 btn-group btn-group-toggle" data-toggle="buttons" style="position:relative;">
                                        @if (Carbon\Carbon::now(new DateTimeZone('America/Phoenix')) > $game['cutofftime'])
                                            <div class="overlay"><h4>LOCKED</h4></div>
                                            <label class="col-md-6 btn btn-team btn-{{ strtolower($clubs[$game['awayteam_id']]['initials']) }} disabled" aria-disabled="true">
                                            </label>
                                            <label class="col-md-6 btn btn-team btn-{{ strtolower($clubs[$game['hometeam_id']]['initials']) }} disabled" aria-disabled="true">
                                            </label>
                                        @else
                                            <label class="col-md-6 btn btn-team btn-{{ strtolower($clubs[$game['awayteam_id']]['initials']) }}">
                                                <input type="radio" name="game[{{ $game['id'] }}]" value="{{ $game['awayteam_id'] }}" class="">
                                            </label>
                                            <label class="col-md-6 btn btn-team btn-{{ strtolower($clubs[$game['hometeam_id']]['initials']) }}">
                                                <input type="radio" name="game[{{ $game['id'] }}]" value="{{ $game['hometeam_id'] }}" class="">
                                            </label>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="accordion col-md-12 col-sm-12" id="accordionDetails">
                                        <div class="card team-{{ strtolower($clubs[$game['hometeam_id']]['initials']) }}">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $game['awayteam_id'] }}" aria-expanded="false" aria-controls="collapseOne">
                                                <div class="card-header text-center">
                                                    <h2 class="text-dark">
                                                        {{ $clubs[$game['awayteam_id']]['city'] }}&nbsp;(0-0) at {{ $clubs[$game['hometeam_id']]['city'] }}&nbsp;(0-0) | Match-up Details&nbsp;&nbsp;<i class="fa fa-chevron-circle-down"></i>
                                                    </h2>
                                                </div>
                                            </button>
                                            <div id="collapse{{ $game['awayteam_id'] }}" class="collapse" data-parent="#accordionDetails">
                                                <div class="card-body team-{{ strtolower($clubs[$game['hometeam_id']]['initials']) }}" style="padding: 10px;">
                                                    <table class="table table-bordered text-center">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" colspan="2" class="team-{{ strtolower($clubs[$game['awayteam_id']]['initials']) }}">{{ strtoupper($clubs[$game['awayteam_id']]['city'])." ".strtoupper($clubs[$game['awayteam_id']]['teamname']) }}</th>
                                                                <th scope="col" colspan="2" class="team-{{ strtolower($clubs[$game['hometeam_id']]['initials']) }}">{{ strtoupper($clubs[$game['hometeam_id']]['city'])." ".strtoupper($clubs[$game['hometeam_id']]['teamname']) }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="">
                                                                <td colspan="4" class="text-center"><strong>Prior Matchup (00): {{ $clubs[$game['awayteam_id']]['initials'] }} 00 / {{ $clubs[$game['hometeam_id']]['initials'] }} 00</strong></td>
                                                            </tr>
                                                            <tr class="">
                                                                <td colspan="2">Last Week: </td>
                                                                <td colspan="2">Last Week: </td>
                                                            </tr>
                                                            <tr class="">
                                                                <td>Win Streak: 0</td>
                                                                <td>Away Record: 0-0</td>
                                                                <td>Win Streak: 0</td>
                                                                <td>Home Record: 0-0</td>
                                                            </tr>
                                                            <tr class="">
                                                                <td>Divison: 0-0</td>
                                                                <td>Divison: 0-0</td>
                                                                <td>Conference: 0-0</td>
                                                                <td>Conference: 0-0</td>
                                                            </tr>                 
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    @if ($game['tiebreaker'] == 1)
                                        <div class="col-md-offset-4 col-md-4 text-center">
                                        {!! Form::hidden('tiebreaker', $game['id']) !!}
                                        {{ 'Enter Tiebreaker Points here: ' }}
                                            {!! Form::text('points', '0', array('class' => 'pick-text')) !!}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach

                            <div class="row">
                                <div class="col-md-4 offset-md-4">
                                    <div class="form-group">
                                        {!! Form::hidden('user_id', Auth::user()->id) !!}
                                        {!! Form::submit('Save My Picks', ['class' => 'btn btn-primary form-control']) !!}
                                    </div>
                                </div>
                            </div>

                            @include ('errors.list')
                        {!! Form::close() !!}
                    </div>
                </div>
                @endif

                <div class="row">
                    <div class="col-md-3">
                        <a href="{{ route('picks.show', $chosen_week_id) }}"><button class="btn btn-secondary">My Picks <i class="fa fa-chevron-circle-right"></i></button></a>
                    </div>

                    <div class="col-md-3">
                        <a href="{{ route('picks.index') }}"><button class="btn btn-secondary">Show All Picks <i class="fa fa-chevron-circle-right"></i></button></a>
                    </div>

                    <div class="col-md-3">
                        <a href="{{ route('calculations.show', $chosen_week_id) }}"><button class="btn btn-secondary">Show Rankings <i class="fa fa-chevron-circle-right"></i></button></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</home>
@endsection
