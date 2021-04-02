<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function getRouteKeyName()
{
    return 'td_tran_no';
}

public function account()
{
    return $this->belongsTo('App\Account');
}
   
}
