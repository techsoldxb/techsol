<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $casts = [
        'item_name' => 'array'
    ];
}
