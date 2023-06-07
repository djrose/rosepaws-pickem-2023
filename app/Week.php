<?php

namespace App;

use App\Game;
use App\Pick;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    /**
     * A week can have many games
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function game()
    {
      return $this->hasMany('App\Game', 'week_id');
    } 

        public function livefeed()
    {
      return $this->hasMany('App\Livefeed', 'week_id');
    } 

    /**
     * A week can have many picks thru games
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    // public function picks()
    // {
    //   return $this->hasManyThrough('App\Pick', 'App\Game');
    // }   
}
