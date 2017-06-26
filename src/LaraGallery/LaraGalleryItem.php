<?php

namespace vicgonvt\LaraGallery;

use Illuminate\Database\Eloquent\Model;

class LaraGalleryItem extends Model
{
    protected $guarded = [];

    public function album()
    {
        return $this->belongsTo(LaraGalleryAlbum::class);
    }
}