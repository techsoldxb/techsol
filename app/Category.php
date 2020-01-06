<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function account()
    {
        $this->hasMany('App\Account');
    }
}
