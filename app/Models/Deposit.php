<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    public function method()
    {
        return $this->belongsTo('App\Models\Method');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
