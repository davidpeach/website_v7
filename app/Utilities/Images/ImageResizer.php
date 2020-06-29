<?php

namespace App\Utilities\Images;

class ImageResizer
{
    protected $resizers = [
        ResizeToLarge::class,
        ResizeToMedium::class,
        ResizeToThumb::class,
    ];

	public function resize($originalImage, $hashName)
	{
        foreach ($this->resizers as $resizer) {
            app($resizer)->handle($originalImage, $hashName);
        }
	}

}
