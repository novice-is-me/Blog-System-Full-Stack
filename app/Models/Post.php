<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['content'];

    // A post belongs to a user
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    // A post can have many likes
    public function likes(){
        return $this->hasMany(Like::class, 'post_id');
    }

    // A post can have many comment
    public function comments(){
        return $this->hasMany(Comment::class, 'post_id');
    }
}
