<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    //This is where we put all the logics as well as the specific view files

    // This is the dashboard as well as the table. 
    public function index(){

        $posts = Post::all();

        return Inertia::render('Dashboard', [
            'posts' => $posts
        ]);
    }

    

}
