<?php

namespace App;

use App\Utilities\Images\ImageSizes;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'path',
    ];

    public function getThumbPath()
    {
        return str_replace(
            ImageSizes::ORIGINAL_PATH,
            ImageSizes::THUMB_PATH,
            $this->path
        );
    }

    public function getMediumPath()
    {
        return str_replace(
            ImageSizes::ORIGINAL_PATH,
            ImageSizes::MEDIUM_PATH,
            $this->path
        );
    }

    public function getLargePath()
    {
        return str_replace(
            ImageSizes::ORIGINAL_PATH,
            ImageSizes::LARGE_PATH,
            $this->path
        );
    }
}
