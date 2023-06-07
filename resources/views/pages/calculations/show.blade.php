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
                <div class="panel panel-default">
                @if ( !empty ( $winnerArray ) )
                    <div class="panel-heading">Rankings</div>
                    	<div class="panel-body">
                            <div class="row">
                                <div class="col-md-3">
                                    {{ '    ' }}
                                </div>
                                <div class="col-md-3 text-center">
                                    {{ 'Season' }}
                                </div>
                                <div class="col-md-3 text-center">
                                    {{ 'This' }}
                                </div>
                                <div class="col-md-3 text-center">
                                    {{ 'Won' }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    {{ 'Name' }}
                                </div>
                                <div class="col-md-3 text-center">
                                    {{ 'Total' }}
                                </div>
                                <div class="col-md-3 text-center">
                                    {{ 'Week' }}
                                </div>
                                <div class="col-md-3 text-center">
                                    {{ 'Last' }}
                                </div>
                            </div>
                        
                        <div class="row">
                            <hr>
                        </div>

                        @foreach ($winnerArray as $winner)
	                    	<div class="row">
	                        	@foreach ($users as $user)
	                        		@if ($winner['user_id'] == $user->id)
                                        <div class="col-md-3">
	                        			    {{ $user->name }}
                                        </div>
                                        <div class="col-md-3 text-center">
                                            {{ $winner['seasonCorrect'] }}
                                        </div>
                                        <div class="col-md-3 text-center">
                                            {{ $winner['thisWeekCorrect'] }}
                                        </div>
                                        <div class="col-md-3 text-center">
                                            @if ($winner['lastWeeksWinner'] == 1)
                                                {{ '***' }}
                                            @else
                                                {{ '   ' }}
                                            @endif
                                        </div>
	                        		@endif
	                        	@endforeach
	                        </div>
                        @endforeach
                    	</div>
                	</div>
                @endif

                <div class="row">
                    <div class="col-md-4">
                        <a href="{{ route('games.index') }}"><button class="btn btn-secondary">Schedule <i class="fa fa-chevron-circle-right"></i></button></a>
                    </div>

                    <div class="col-md-4">
                        <a href="{{ route('picks.index') }}"><button class="btn btn-secondary">Show All Picks <i class="fa fa-chevron-circle-right"></i></button></a>
                    </div>

                    <div class="col-md-4">
                        <a href="{{ '/home' }}"><button class="btn btn-secondary">Home <i class="fa fa-chevron-circle-right"></i></button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</home>
@endsection


