<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()
            ->paginate(config('pagination.posts-index'));

        return view('blog.index', compact('posts'));
    }
}
