<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function create(Request $request)
    {
        $post = $request->input('newPost');
        \DB::table('posts')->insert([
            'post' => $post
        ]);

        return redirect('index');
    }

    public function index(){
        return view('posts.index');
    }
}
