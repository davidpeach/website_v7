<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActivitiesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function published_posts_will_create_an_activity_entry()
    {
        // Given im signed in
        $this->signIn();

        // When I create a post
        $post = create('App\Post');

        // An activity should be created
        $this->assertDatabaseHas('activities', [
            'type' => 'created_post',
            'user_id' => auth()->id(),
            'subject_id' => $post->id,
            'subject_type' => get_class($post),
        ]);
    }

    /** @test */
    public function the_activities_page_will_show_all_latest_activity()
    {
        $this->signIn();

        $post = create('App\Post');

        $this->get(route('stream'))
            ->assertSee('Published '. $post->title);
    }
}
