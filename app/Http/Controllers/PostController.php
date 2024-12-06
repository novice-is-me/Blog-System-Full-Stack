<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function create(){

        return Inertia::render('Posts/Create');
    }

    public function store(Request $request){
        
        $user = Auth::user()->id;

        $request->validate([
            'content' => 'required | string',
        ]);

        Post::create([
            'user_id' => $user,
            'content' => $request->content
        ]);

        return redirect()->route('dashboard');
    }

    public function edit($index){
        return Inertia::render('Posts/Edit', [
            'index' => $index
        ]);
    }

    public function like($index){
        // Ge the user Id
        $user = Auth::user()->id;

        // Get the post based on the index
        $post = Post::find($index);

        $liked = $post->likes()->where('user_id', $user)->exists();

        if($post->likes()->where('user_id', $user)->exists()){
            // Remove the relationship
            $post->likes()->where('user_id', $user)->delete();
        }else{
            // Create the relationship
            $post->likes()->create([
                'user_id' => $user,
                'post_id' => $index
            ]);
        }


        // return Inertia::render('PostComponent', [
        //     'liked' => $liked
        // ]);
        
    }
}
