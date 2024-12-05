<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // Comment belongs to a user
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    // Comment belongs to a post
    public function post(){
        return $this->belongsTo(Post::class, 'post_id');
    }
}
