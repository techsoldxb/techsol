<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    public function getRouteKeyName()
{
    return 'td_tran_no';
}

public function account()
{
    return $this->belongsTo('App\account');
}
   
}
