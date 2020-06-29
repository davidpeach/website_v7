<?php

namespace Tests\Feature;

use App\Post;
use App\Utilities\Images\ImageSizes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CreatePostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_authed_person_can_create_a_post()
    {
        $this->signIn();

        $this->post(route('dashboard.post.store'), [
            'title' => 'My New Post',
            'body' => 'My new post body'
        ]);

        $this->assertDatabaseHas('posts', [
            'title' => 'My New Post',
            'body' => 'My new post body'
        ]);
    }

    /** @test */
    public function a_guest_can_not_create_a_post()
    {
        $this->expectException('\Illuminate\Auth\AuthenticationException');

        $this->post(route('dashboard.post.store'), [
            'title' => 'My New Post',
            'body' => 'My new post body'
        ]);
    }

    /** @test */
    public function a_post_must_have_a_body()
    {
        $this->withExceptionHandling()->signIn();

        $this->post(route('dashboard.post.store'), [
            'title' => 'My New Post',
        ])->assertSessionHasErrors('body');
    }

    /** @test */
    public function a_post_body_can_be_written_in_markdown()
    {
        $this->signIn();

        $this->post(route('dashboard.post.store'), [
            'title' => 'My New Post',
            'body' => "## My header 2\rThis is a paragraph"
        ]);

        $post = Post::first();

        $this->assertEquals(
            "<h2>My header 2</h2>\n<p>This is a paragraph</p>\n",
            $post->body_html
        );
    }

    /** @test */
    public function a_post_can_have_an_image()
    {
        $this->signIn();

        Storage::fake('public');

        $this->json('POST', route('dashboard.post.store'), [
            'body' => 'this is my image blog post.',
            'image' => [
                $file = UploadedFile::fake()->image('blog-image.jpg'),
            ],
        ]);

        $post = Post::first();
        $this->assertCount(1, $post->images);

        Storage::disk('public')->assertExists(ImageSizes::ORIGINAL_PATH . $file->hashName());
    }

    /** @test */
    public function a_post_can_have_multiple_images()
    {
        $this->signIn();

        Storage::fake('public');

        $this->json('POST', route('dashboard.post.store'), [
            'body' => 'this is my image blog post.',
            'image' => [
                $fileOne = UploadedFile::fake()->image('blog-image-1.jpg'),
                $fileTwo = UploadedFile::fake()->image('blog-image-2.jpg'),
            ],
        ]);

        $post = Post::first();
        $this->assertCount(2, $post->images);

        Storage::disk('public')
            ->assertExists(ImageSizes::ORIGINAL_PATH . $fileOne->hashName());
        Storage::disk('public')
            ->assertExists(ImageSizes::ORIGINAL_PATH . $fileTwo->hashName());
    }
}
