<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()
            ->paginate(15);

    	return view('dashboard.posts', compact('posts'));
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

        return redirect()->route('dashboard.post.index');
    }
}
