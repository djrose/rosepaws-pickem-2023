<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = [
      'conference_id',
      'division'
    ];

    /**
     * A division is owned by a conference
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function conference()
    {
      return $this->belongsTo('App\Conference', 'conference_id');
    }
}
