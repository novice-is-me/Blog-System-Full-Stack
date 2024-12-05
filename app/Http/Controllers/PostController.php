<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    //
    public function create(){
        return Inertia::render('Posts/Create');
    }

    public function edit($index){
        return Inertia::render('Posts/Edit', [
            'index' => $index
        ]);
    }
}
