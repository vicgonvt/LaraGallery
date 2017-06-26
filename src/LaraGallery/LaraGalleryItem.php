<?php

namespace vicgonvt\LaraGallery;

use Illuminate\Database\Eloquent\Model;

class LaraGalleryItem extends Model
{
    protected $guarded = [];

    public function scopePending($query)
    {
        return $query->where('processed', 0);
    }

    public function process()
    {
        dd('inside');
    }

    // RELATIONSHIP

    public function album()
    {
        return $this->belongsTo(LaraGalleryAlbum::class);
    }
}