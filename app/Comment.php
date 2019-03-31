<?php

namespace App;


use App\User;
use App\Post; 
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    protected $guarded = [];
    
    public function user(){

        return $this->belongsTo(User::class);
    
    }
 
}
