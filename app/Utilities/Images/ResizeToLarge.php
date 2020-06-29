<?php

namespace App\Utilities\Images;

class ResizeToLarge extends Resizer
{
    public function getMaxWidth()
    {
        return ImageSizes::LARGE_WIDTH;
    }

    public function getMaxHeight()
    {
        return ImageSizes::LARGE_HEIGHT;
    }

    public function getDestinationPath()
    {
        return ImageSizes::LARGE_PATH;
    }
}
