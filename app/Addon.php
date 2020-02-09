<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    public function Booking()
    {
        $this->hasMany('App\Booking');
    }
}
