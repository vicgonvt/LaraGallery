<?php

namespace vicgonvt\LaraGallery;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $guarded = [];

    public function setAlbumNameAttribute($value)
    {
        $this->attributes['album_name'] = basename($value);
    }

    public function getAlbumImages()
    {
        return collect(glob($this->album_path . '/*'));
    }

    // RELATIONSHIPS

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}