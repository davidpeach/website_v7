<?php

namespace App\Utilities\Images;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;

abstract class Resizer
{
	protected $image;

	protected $filename;

	public function handle($image, $filename)
	{
        $this->image = $this->makeImage($image);
        $this->filename = $filename;

        if ($this->smallerInBothDimensions()) {

            $this->saveImage();
            return;

        }

        if($this->imageIsLandscape()) {

            $this->resizeToWidth();

            if ($this->biggerThanMaxHeight()) {
                $this->resizeToHeight();
            }

        } else {

            $this->resizeToHeight();

            if ($this->biggerThanMaxWidth()) {
                $this->resizeToWidth();
            }

        }

        $this->saveImage();
	}

	protected function makeImage($image)
	{
		return InterventionImage::make($image)->encode('jpg');
	}

	public function smallerInBothDimensions(): bool
	{
		return
			$this->image->width() < $this->getMaxWidth() &&
			$this->image->height() < $this->getMaxHeight();
	}

	public function imageIsLandscape()
	{
		return $this->image->width() > $this->image->height();
	}

	public function biggerThanMaxWidth()
	{
		return $this->image->width() > $this->getMaxWidth();
	}

	public function biggerThanMaxHeight()
	{
		return $this->image->height() > $this->getMaxHeight();
	}

	public function resizeToWidth()
	{
		$this->image->resize($this->getMaxWidth(), null, function ($constraint) {
            $constraint->aspectRatio();
        });
	}

	public function resizeToHeight()
	{
		$this->image->resize(null, $this->getMaxHeight(), function ($constraint) {
            $constraint->aspectRatio();
        });
	}

	public function resizeToBothDimensions()
	{
		$this->image->fit($this->getMaxWidth(), $this->getMaxHeight(), function ($constraint) {
            $constraint->upsize();
        });
	}

	public function saveImage()
	{
		Storage::put(
            $this->getDestinationPath() . $this->filename,
            $this->image->save(null, config('image.jpg_save_quality'))
        );
	}

	public abstract function getMaxWidth();

	public abstract function getMaxHeight();

	public abstract function getDestinationPath();
}
