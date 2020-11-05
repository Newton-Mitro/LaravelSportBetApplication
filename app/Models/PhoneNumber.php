<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
    public function method()
    {
        return $this->belongsTo('App\Models\Method');
    }
}
