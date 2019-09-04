<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    protected $guarded;

    public function comments()
    {
        return $this->morphMany(Comment::class, 'comment_able');
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
