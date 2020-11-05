<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    public function matches()
    {
        return $this->hasMany('App\Models\Match');
    }


}
