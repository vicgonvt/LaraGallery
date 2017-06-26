<?php

namespace vicgonvt\LaraGallery;

use Illuminate\Database\Eloquent\Model;

class LaraGalleryAlbum extends Model
{
    protected $guarded = [];

    public function setAlbumNameAttribute($value)
    {
        $this->attributes['album_name'] = basename($value);
    }

    public function getAlbumImages($albumPath)
    {
        return collect(glob($albumPath . '/*'));
    }

    // RELATIONSHIPS

    public function images()
    {
        return $this->hasMany(LaraGalleryItem::class);
    }
}