<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Image;
use App\Utilities\Images\ImageResizer;
use App\Utilities\Images\ImageSizes;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function store(ImageResizer $resizer)
    {
        $this->validate(request(), [
            'image' => 'image',
        ]);

        $file = request()->file('image');

        $image = Image::create([
            'path' => $file->store(ImageSizes::ORIGINAL_PATH, 'public'),
        ]);

        $resizer->resize($file, $file->hashName());
    }
}
