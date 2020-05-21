<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('blog.index', compact('posts'));
    }

    public function store()
    {
        $this->validate(request(), [
            'body' => 'required',
        ]);

        Post::create(request()->all());
    }

}
