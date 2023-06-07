<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    protected $fillable = [
      'conference'
    ];

    /**
     * A conference can have many divisions
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function divisions()
    {
      return $this->hasMany('App\Division');
    }
}
