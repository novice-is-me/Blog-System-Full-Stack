<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    //This is where we put all the logics as well as the specific view files

    // This is the dashboard as well as the table. 
    public function index(){

        $posts = Post::with('user', 'comments.user')->withCount('likes', 'comments')->get();
        // Get all the likes for each post
        
        $user = Auth::user()->admin;
        // dd($comments);
        return Inertia::render('Dashboard', [
            'posts' => $posts,
            'user' => $user,
            // // 'likes' => $likes,s
        ]);
    }

    
}
