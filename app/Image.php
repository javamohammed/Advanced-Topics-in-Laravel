<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $guarded = [];

    public function image_able()
    {
        return $this->morphTo();
    }
}
