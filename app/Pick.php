<?php

namespace App;

use App\Game;
use App\Club;
use App\Week;


use Illuminate\Database\Eloquent\Model;

class Pick extends Model
{
    protected $fillable = [
      'user_id',
      'game_id',
      'club_id',
      'points'
    ];
    
    /*
	* A pick can have only one club team
	*
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function club()
	{
		return $this->belongsTo('App\Club', 'club_id');
	} 

    /*
	* A pick can have only one game
	*
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function game()
	{
		return $this->belongsTo('App\Game');
	} 

    /*
	* A pick can have only one user
	*
	* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	*/
	public function user()
	{
		return $this->belongsTo('App\User', 'user_id');
	} 
}