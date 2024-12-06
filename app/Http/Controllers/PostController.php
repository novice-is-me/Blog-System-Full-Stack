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
}
