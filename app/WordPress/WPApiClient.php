<?php

namespace App\WordPress;

use App\Post;

class WPApiClient
{
    protected $uri = 'https://davidpeach.co.uk/wp-json/wp/v2/';

    public function importPosts(int $page = 1)
    {
        $posts = \Http::get($this->uri . 'posts?_embed&filter[orderby]=modified&per_page=25&page=' . $page);
        
        foreach($posts->json() as $attributes) {
            $this->syncPost($attributes);
        }
    }

    public function syncPost(array $attributes)
    {
        $found = Post::where('wp_id', $attributes['id'])->first();

        if (! $found) {
            return $this->createPost($attributes);
        }

        if ($found and $found->updated_at->format("Y-m-d H:i:s") < $this->carbonDate($attributes['modified'])->format("Y-m-d H:i:s")) {
            return $this->updatePost($found, $attributes);
        }
    }

    public function createPost(array $attributes)
    {
        $post = Post::create([
            'wp_id' => $attributes['id'],
            'title' => $attributes['title']['rendered'],
            'body' => $attributes['content']['rendered'],
            'published_at' => $attributes['date'],
            'updated_at' => $attributes['modified'],
        ]);
    }
}