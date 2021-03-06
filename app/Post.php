<?php

namespace App;

use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
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
        });

        parent::boot();
    }

    public function images()
    {
        return $this->belongsToMany(Image::class);
    }

    public function setBodyAttribute($body)
    {
        $this->attributes['body'] = $body;
        $this->attributes['body_html'] = Markdown::convertToHtml($body);
    }
}
