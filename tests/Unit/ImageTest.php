<?php

namespace Tests\Unit;

use App\Utilities\Images\ImageSizes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ImageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_image_can_return_its_thumbnail_path()
    {
        $this->signIn();

        $image = factory('App\Image')->create([
            'path' => ImageSizes::ORIGINAL_PATH . 'my-image-title.jpeg',
        ]);

        $this->assertEquals(
            ImageSizes::THUMB_PATH . 'my-image-title.jpeg',
            $image->getThumbPath()
        );
    }

    /** @test */
    public function an_image_can_return_its_medium_image_path()
    {
        $this->signIn();

        $image = factory('App\Image')->create([
            'path' => ImageSizes::ORIGINAL_PATH . 'my-image-title.jpeg',
        ]);

        $this->assertEquals(
            ImageSizes::MEDIUM_PATH . 'my-image-title.jpeg',
            $image->getMediumPath()
        );
    }

    /** @test */
    public function an_image_can_return_its_large_image_path()
    {
        $this->signIn();

        $image = factory('App\Image')->create([
            'path' => ImageSizes::ORIGINAL_PATH . 'my-image-title.jpeg',
        ]);

        $this->assertEquals(
            ImageSizes::LARGE_PATH . 'my-image-title.jpeg',
            $image->getLargePath()
        );
    }
}
