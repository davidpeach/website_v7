<?php

namespace App\Utilities\Images;

class ResizeToThumb extends Resizer
{
	public function handle($image, $filename)
	{
        $this->image = $this->makeImage($image);
        $this->filename = $filename;

        $this->resizeToBothDimensions();

        $this->saveImage();
	}

    public function getMaxWidth()
    {
        return ImageSizes::THUMB_WIDTH;
    }

    public function getMaxHeight()
    {
        return ImageSizes::THUMB_HEIGHT;
    }

    public function getDestinationPath()
    {
        return ImageSizes::THUMB_PATH;
    }
}
