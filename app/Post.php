<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use VanOns\Laraberg\Models\Gutenbergable;

class Post extends Model
{
    use Gutenbergable;

    protected $fillable = [
        'title',
        'body',
    ];

    public static function boot()
    {
        static::created(function ($post) {
            Activity::create([
                'type' => 'created_post',
                'user_id' => auth()->id(),
                'subject_id' => $post->id,
                'subject_type' => get_class($post),
            ]);

            $post->lb_content = request()->get('body');
            $post->save();
        });

        static::updating(function ($post) {
            $post->lb_content = request()->get('body');
        });

        parent::boot();
    }
}
