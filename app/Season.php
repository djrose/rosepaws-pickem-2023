<?php

namespace App;

use Week;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['sport_id', 'season_start', 'season_end'];



    /**
     * A season can have many weeks
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function week()
    {
      return $this->hasMany('App\Week', 'season_id');
    } 
}
