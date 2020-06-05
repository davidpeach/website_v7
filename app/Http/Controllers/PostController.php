<?php

namespace App\Http\Controllers;

use App\Post;
use App\WordPress\WPApiClient;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(WPApiClient $wp)
    {
        $wp->importPosts(2);



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
