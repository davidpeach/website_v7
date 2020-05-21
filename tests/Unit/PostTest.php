<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
	use RefreshDatabase;

    /** @test */
    public function a_post_can_have_a_title()
    {
    	$post = create('App\Post', [
    		'title' => 'My blog post',
    	]);

    	$this->assertEquals('My blog post', $post->title);
    }

    /** @test */
    public function a_post_can_have_a_body()
    {
    	$post = create('App\Post', [
    		'body' => 'this is my awesome blog post.',
    	]);

    	$this->assertEquals('this is my awesome blog post.', $post->body);
    }
}
