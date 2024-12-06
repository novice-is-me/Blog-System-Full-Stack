<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model

{
    protected $fillable = ['user_id', 'post_id'];
    // A like belongs to a user
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    // A like belongs to a post
    public function post(){
        return $this->belongsTo(Post::class, 'post_id');
    }
}
