<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function method()
    {
        return $this->belongsTo('App\Models\Method');
    }

    public function accountType()
    {
        return $this->belongsTo('App\Models\AccountType');
    }
}
