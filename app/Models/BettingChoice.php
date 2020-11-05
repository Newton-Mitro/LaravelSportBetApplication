<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BettingChoice extends Model
{
    public function bettingQuestion()
    {
        return $this->belongsTo('App\Models\BettingQuestion');
    }
}
