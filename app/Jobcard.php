<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Jobcard extends Model
{
   // protected $dates = ['job_invoice_date'];

   public function getCreatedAtAttribute($value)
{
    $date = new Carbon($value);
    return $date->toDayDateTimeString();
}

}


