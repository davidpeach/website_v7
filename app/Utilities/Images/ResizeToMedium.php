<?php

namespace App\Utilities\Images;

class ResizeToMedium extends Resizer
{
	public function getMaxWidth()
	{
		return ImageSizes::MEDIUM_WIDTH;
	}

	public function getMaxHeight()
	{
		return ImageSizes::MEDIUM_HEIGHT;
	}

	public function getDestinationPath()
    {
        return ImageSizes::MEDIUM_PATH;
    }
}
