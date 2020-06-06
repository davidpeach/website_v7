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
        $post = new Post;
        $action = route('post.store');
        $method = 'post';
        return view('dashboard.create-post', compact('post', 'action', 'method'));
    }

    public function store()
    {
        $this->validate(request(), [
            'body' => 'required',
        ]);

        $post = Post::create(request()->all());

        return redirect()->route('post.edit', $post);
    }

    public function edit(Post $post)
    {
        $action = route('post.update', $post);
        $method = 'patch';
        return view('dashboard.create-post', compact('post', 'action', 'method'));
    }

    public function update(Post $post)
    {
        $this->validate(request(), [
            'body' => 'required',
        ]);

        $post->update([
            'title' => request()->get('title'),
            'body' => request()->get('body'),
        ]);

        return back();
    }
}
