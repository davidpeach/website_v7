<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Image;
use App\Post;
use App\Utilities\Images\ImageSizes;
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
            'image.*' => 'image',
        ]);

        $post = Post::create(request()->all());

        if (request()->has('image')) {

            foreach (request()->file('image') as $imageToUpload) {
                $image = Image::create([
                    'path' => $imageToUpload->store(ImageSizes::ORIGINAL_PATH, 'public'),
                ]);

                $post->images()->attach($image);
            }
        }

        return redirect()->route('dashboard.post.index');
    }
}
