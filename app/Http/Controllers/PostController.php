<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();

        return view('blog.index', compact('posts'));
    }

    public function create()
    {
        return view('dashboard.create-post');
    }


    public function store()
    {
        $this->validate(request(), [
            'body' => 'required',
        ]);

        Post::create(request()->all());

        return back();
    }

}
