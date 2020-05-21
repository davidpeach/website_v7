<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReadActivitiesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function published_posts_will_display_as_activities_in_a_feed()
    {
        //
    }
}
