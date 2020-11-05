<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BettingQuestion extends Model
{
    public function match()
    {
        return $this->belongsTo('App\Models\Match');
    }

    public function bettingChoices()
    {
        return $this->hasMany('App\Models\BettingChoice');
    }
}
