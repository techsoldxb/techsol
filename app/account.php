<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    public function getRouteKeyName()
{
    return 'th_tran_no';
}

}



