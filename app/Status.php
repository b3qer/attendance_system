<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //
    protected $fillable = [
        'status', 'hour', 'student_id', 'user_id', 
    ];
    public function student(){
        return $this->belognsTO('App\Student');
    }
}
