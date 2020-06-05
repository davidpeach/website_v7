<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'wp_id',
        'title',
        'body',
        'published_at',
        'updated_at'
    ];

    public $dates = [
        'published_at',
    ];

    public static function boot()
    {
        static::created(function ($post) {
            Activity::create([
                'type' => 'created_post',
                'user_id' => auth()->id() ?? 1, // fallback to my ID Eek.
                'subject_id' => $post->id,
                'subject_type' => get_class($post),
            ]);
        });

        parent::boot();
    }
}
