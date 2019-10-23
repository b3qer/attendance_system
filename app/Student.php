<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Student extends Authenticatable
{
    //
    use Notifiable;

    protected $guard = 'student';

    protected $fillable = [
        'username', 'password', 'college_no', 
        'name', 'stage_id',
    ];

    protected $hidden = [
        'password', 
    ];
    public function stage(){
        return $this->belongsTO('App\Stage');
    }
    public function status(){
        return $this->hasMany('App\Status');
    }
}
