<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    //
    protected $fillable = [
        'stage', 'group',
    ];
   
    public function user(){
        return $this->hasMany('App\User');
    }
    public function student(){
        return $this->hasMany('App\Student');
    }
   
}
