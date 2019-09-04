<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $guarded = [];

    public function image()
    {
        return $this->morphOne(Image::class, 'image_able');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'comment_able');
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
