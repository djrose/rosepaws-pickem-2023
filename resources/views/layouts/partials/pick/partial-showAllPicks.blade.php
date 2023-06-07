<table>
	<tr>
		<td colspan=3>
			{{ "Game" }}
		</td>
		<td colspan=3>
			{{ "Score" }}
		</td>
		<td>
			{{ "Winner" }}
		</td>
		@foreach ($users as $user) 
    		<th>{{ $user->name }}</th>
		@endforeach
   	</tr>

	@php $i = 0; @endphp
	@foreach ($games as $game) 
	<tr>
		<td style='text-align:center'>{{ $clubs[$game->awayteam_id]['initials'] }}</td>
		<td style='text-align:center'>v</td>
		<td style='text-align:center'>{{ $clubs[$game->hometeam_id]['initials'] }}</td>

		<td style='text-align:right'>{{ $game->away_score }}</td>
		<td style='text-align:center'>-</td>
		<td style='text-align:right'>{{ $game->home_score }}</td>

		@if (($game->away_score > 0) || ($game->home_score > 0))
			@if ($game->away_score > $game->home_score)
				<td style='text-align:center;'>
					{{ $clubs[$game->awayteam_id]['initials'] }}</td>
			@elseif  ($game->away_score < $game->home_score)
				<td style='text-align:center;'>
					{{ $clubs[$game->hometeam_id]['initials'] }}</td>
			@else
				<td>{{ 'tie' }}</td>
			@endif
		@else
			<td></td>
		@endif	
	
		@if ( count($picks) > 0 && $game->game_id == $picks[$i]->game_id)
			@foreach ($users as $user)
				@if ($i < count($picks) && $game->game_id == $picks[$i]->game_id && $user->id == $picks[$i]->user_id)
					<td style='text-align:center'>
			        	{{ $clubs[$picks[$i]->club_id]['initials'] }}
			        </td>
				    @php if ($i < count($picks)) { $i++; } @endphp
		        @else
			    	<td>
			        	{{ "&nbsp;&nbsp;&nbsp;&nbsp;" }}	
			    	</td>
			    @endif  <!-- end if = user_id -->
			@endforeach  <!-- end foreach users --> 
		@endif  <!-- end if = gameid --> 
	</tr>  <!-- end row  --> 
	@endforeach  <!-- end foreach games -->


	<tr>
		@php $i=0; @endphp
		<td colspan=2>{{ '   ' }}</td>
		<td colspan=5>{{ 'Total Correct' }}</td>		
		@foreach ($users as $user)
			@if ($i <= count($redisArray) && $user->id == $redisArray[$i]['user_id'])
				<td style='text-align:center'>
					{{ $redisArray[$i]['correct'] }}
					@php $i++; @endphp
				</td>
			@else
				<td style='text-align:center'>{{ "   " }}</td>
			@endif
		@endforeach
	</tr>


	<!-- show score chosen for tiebreaker situation -->
	<tr>
		@php $i=0; @endphp
		<td colspan=2>{{ '   ' }}</td>
		<td colspan=5>{{ 'Tiebreaker' }}</td>		
			@foreach ($users as $user)
				@if ( $i <= count($redisArray) && $user->id == $redisArray[$i]['user_id'])
					<td style='text-align:center;'>
						{{ $redisArray[$i]['points'] }}
					</td>
					@php $i++; @endphp
				@else
					<td style='text-align:center'>{{ "   " }}</td>
				@endif
			@endforeach
	</tr>


	<!-- show weekly winner(s) -->
	<tr>
		<td colspan=2>{{ "    " }}</td>
		<td colspan=5>{{ "Weekly Winner" }}</td>
		@php $i=0; @endphp	
		@foreach ($users as $user)
			@if ( $i < count($winnersArray) && $user->id == $winnersArray[$i]['user_id'])
				<td style='text-align:center'>
					{{ $winnersArray[$i]['user_id'] }}
				</td>
				@php if( $i <= count($winnersArray)) { $i++; } @endphp
			@else
				<td style='text-align:center'>{{ "   " }}</td>
			@endif
		@endforeach
	</tr>
</table>