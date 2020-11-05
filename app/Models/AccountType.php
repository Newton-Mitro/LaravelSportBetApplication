<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    public function withdraws()
    {
        return $this->hasMany('App\Models\Withdraw');
    }
}
