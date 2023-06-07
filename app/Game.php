<?php

namespace App;

use App\Pick;
use App\Club;
use App\Week;

use Illuminate\Database\Eloquent\Model;

class Game extends Model {
    protected $fillable = [
      'game_start', 'away_score', 'home_score'
    ];

    /**
     * The attributes that should be mutated to dates.
     *  https://laravel.com/docs/5.5/eloquent-mutators
     * @var array
     */
    protected $dates = [
        'game_start',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * A game can have two club teams
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function club() {
      return $this->belongsTo('App\Club', 'id');
        // return $this->belongTo(Club::class);
    }   

    /**
     * A game can have many picks
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pick() {
      return $this->hasMany('App\Pick');
    }   
}

