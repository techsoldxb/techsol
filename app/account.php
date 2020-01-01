<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    
    protected $dates = ['th_bill_dt'];
    public function getRouteKeyName()
{
    return 'th_tran_no';
    
}

public function item()
{
    return $this->hasmany('App\item');
}

}



