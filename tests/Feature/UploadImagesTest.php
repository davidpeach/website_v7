<?php

namespace Tests\Feature;

use App\Utilities\Images\ImageSizes;
use App\Utilities\Images\ResizeToThumb;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Mockery;
use Tests\TestCase;

class UploadImagesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function uploaded_images_will_have_a_thumbnail_created()
    {
        $this->signIn();

        //upload an image
        Storage::fake('public');

        $this->post(route('dashboard.image.store'), [
            'image' => $file = UploadedFile::fake()->image('blog-image.jpg', 1000, 1000),
        ]);

        Storage::disk('public')->assertExists(ImageSizes::ORIGINAL_PATH . $file->hashName());
        Storage::disk('public')->assertExists(ImageSizes::THUMB_PATH . $file->hashName());
    }

    /** @test */
    public function uploaded_images_will_have_a_medium_image_created()
    {
        $this->signIn();

        Storage::fake('public');

        $this->post(route('dashboard.image.store'), [
            'image' => $file = UploadedFile::fake()->image('blog-image.jpg', 1000, 1000),
        ]);

        Storage::disk('public')->assertExists(ImageSizes::ORIGINAL_PATH . $file->hashName());
        Storage::disk('public')->assertExists(ImageSizes::MEDIUM_PATH . $file->hashName());
    }

    /** @test */
    public function uploaded_images_will_have_a_large_image_created()
    {
        $this->signIn();

        Storage::fake('public');

        $this->post(route('dashboard.image.store'), [
            'image' => $file = UploadedFile::fake()->image('blog-image.jpg', 1000, 1000),
        ]);

        Storage::disk('public')->assertExists(ImageSizes::ORIGINAL_PATH . $file->hashName());
        Storage::disk('public')->assertExists(ImageSizes::LARGE_PATH . $file->hashName());
    }
}
