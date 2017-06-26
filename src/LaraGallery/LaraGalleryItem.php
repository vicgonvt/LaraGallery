<?php

namespace vicgonvt\LaraGallery;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManagerStatic as Image;

class LaraGalleryItem extends Model
{
    protected $guarded = [];

    public function scopePending($query)
    {
        return $query->where('processed', 0);
    }

    public function process()
    {
        if ( ! is_dir(dirname($this->filePath()))) {
            mkdir(dirname($this->filePath()));
        }

        $image = Image::make($this->item_path);
        $image->save($this->filePath());
        $image->fit(300, 200)
            ->save($this->filePath('-thumbs'));

        $this->update([
            'item_path' => "{$this->album->id}/{$this->id}.jpg",
            'processed' => 1,
        ]);
    }

    /**
     * @param string $extras
     *
     * @return string
     */
    private function filePath($extras = '')
    {
        return storage_path("app/lara_gallery/{$this->album->id}/{$this->id}{$extras}.jpg");
    }

    // RELATIONSHIP

    public function album()
    {
        return $this->belongsTo(LaraGalleryAlbum::class, 'lara_gallery_album_id');
    }


}