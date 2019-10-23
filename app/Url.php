<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    //
    protected $fillable = [
        'namber', 'user_id', 'activate', 'hour',
    ];
    
    public function user(){
        return $this->belognsTO('App\User');
    }
}
