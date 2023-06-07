@extends('layouts.master')

@section('content')
<home :user="user" inline-template>
    <div class="spark-screen container">
        <div class="row">
            <div class="col-md-8">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
            </div>

            <div class="col-md-8">
                @if ( !empty ( $clubs ) && (!$clubs->isEmpty()) )
                <div class="panel panel-default">
                    <div class="panel-heading">Clubs</div>

                    <div class="panel-body">
                        <ul>
                            @foreach ($clubs as $club)
                            <li><strong>{{ $club->team }}</strong>
                                <a href="/clubs/{{ $club->id }}/edit">
                                    <button class="btn btn-primary">
                                        <i class="fa fa-cog"></i>
                                    </button>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                <a href="{{ route('games.index', Redis::hget('redis_session', 'chosen_week_id')) }}"><button class="btn btn-secondary">Games <i class="fa fa-chevron-circle-right"></i></button></a>
            </div>
        </div>
    </div>
</home>
@endsection
