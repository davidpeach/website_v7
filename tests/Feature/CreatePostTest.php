<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreatePostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_authed_person_can_create_a_post()
    {
        $this->signIn();

        $this->post(route('post.store'), [
            'title' => 'My New Post',
            'body' => 'My new post body'
        ])->assertStatus(200);

        //
    }

    /** @test */
    public function a_post_must_have_a_body()
    {
        $this->withExceptionHandling()->signIn();

        $this->post(route('post.store'), [
            'title' => 'My New Post',
        ])->assertSessionHasErrors('body');
    }
}
