<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    public function deposits()
    {
        return $this->hasMany('App\Models\Deposit');
    }

    public function withdraws()
    {
        return $this->hasMany('App\Models\Withdraw');
    }

    public function phoneNumbers()
    {
        return $this->hasMany('App\Models\PhoneNumber');
    }
}
