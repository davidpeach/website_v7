<?php

namespace Tests\Feature;

use App\Post;
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
    public function a_post_can_have_an_image()
    {
        // Given we have a user
        $this->signIn();

        // When we create a post with an image
        Storage::fake('public');

        $this->json('POST', route('dashboard.post.store'), [
            'body' => 'this is my image blog post.',
            'image' => $file = UploadedFile::fake()->image('blog-image.jpg'),
        ]);

        $post = Post::first();
        $this->assertCount(1, $post->images);

        // Then that image should be displayed.
        Storage::disk('public')->assertExists('images/' . $file->hashName());
    }
}
