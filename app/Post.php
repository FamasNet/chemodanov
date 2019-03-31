<?php

namespace App;

use App\User;
use App\Comment; 
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    
    public function user(){

        return $this->belongsTo(User::class);
    
    }

    public function comments(){

        return $this->hasMany(Comment::class);
    
    }

    public function addComment($body){

        $this->comments()->create(['body' => $body,
                                   'user_id' => auth()->id(),
                                ]);
    
    }


}
