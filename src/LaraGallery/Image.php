<?php

namespace vicgonvt\LaraGallery;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = [];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}