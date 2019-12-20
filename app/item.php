<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    public function getRouteKeyName()
{
    return 'td_tran_no';
}
   
}
