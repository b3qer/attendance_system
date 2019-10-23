<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class link extends Model
{
    
    protected $fillable = [
        'active', 'stg_id',
    ];
}
