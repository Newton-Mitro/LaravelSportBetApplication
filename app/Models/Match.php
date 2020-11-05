<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    public function sport()
    {
        return $this->belongsTo('App\Models\Sport');
    }

    public function bettingQuestions()
    {
        return $this->hasMany('App\Models\BettingQuestion');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }
}
