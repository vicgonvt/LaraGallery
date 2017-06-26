<?php

namespace vicgonvt\LaraGallery;

use Illuminate\Database\Eloquent\Model;

class LaraGalleryAlbum extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * Setter method for the Album Name using the directory name.
     *
     * @param $value
     */
    public function setAlbumNameAttribute($value)
    {
        $this->attributes['album_name'] = basename($value);
    }

    /**
     * Retrieves the file name of all of the images associated with this directory.
     *
     * @param $albumPath
     *
     * @return \Illuminate\Support\Collection
     */
    public function getAlbumImages($albumPath)
    {
        return collect(glob($albumPath . '/*.jpg'));
    }

    // RELATIONSHIPS

    /**
     * Returns a collection of LaraGalleryItems associated with this album.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(LaraGalleryItem::class);
    }
}