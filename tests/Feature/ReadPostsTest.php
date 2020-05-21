<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReadPostsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_visitor_can_see_the_archive_of_published_posts()
    {
        list($postOne, $postTwo, $postThree) = create('App\Post', [], 3);

        $this->get(route('blog'))
            ->assertSee($postOne->title)
            ->assertSee($postOne->body)
            ->assertSee($postTwo->title)
            ->assertSee($postTwo->body)
            ->assertSee($postThree->title)
            ->assertSee($postThree->body);
    }
}
