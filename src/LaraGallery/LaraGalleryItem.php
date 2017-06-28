<?php

namespace vicgonvt\LaraGallery;

use function escapeshellcmd;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use function str_replace;

class LaraGalleryItem extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * Returns the full path to the thumbnail image.
     *
     * @return string
     */
    public function thumbnail()
    {
        return $this->item_thumbnail;
    }

    /**
     * Returns the full path to the image.
     *
     * @return string
     */
    public function fullImage()
    {
        return $this->item_path;
    }

    public function next()
    {
        $current = $this->id + 1;

        return str_replace("/{$this->id}", "/{$current}", url()->current());
    }

    public function prev()
    {
        $current = $this->id - 1;

        return str_replace("/{$this->id}", "/{$current}", url()->current());
    }

    /**
     * Scopes the query to contain only unprocessed items in the DB.
     *
     * @param $query
     *
     * @return mixed
     */
    public function scopePending($query)
    {
        return $query->where('processed', 0);
    }

    /**
     * Moves the image file, generates a thumbnail and updates the DB.
     *
     * @return void
     */
    public function process()
    {
        $image = Image::make($this->item_path)->stream('jpg', 80);
        $imageThumb = Image::make($this->item_path)->fit(400, 300)->stream('jpg', 60);

        Storage::disk('s3')->put($this->filename(), $image->__toString());
        Storage::disk('s3')->put($this->filename('_thumb'), $imageThumb->__toString());

        $this->update([
            'item_path' => Storage::disk('s3')->url($this->filename()),
            'item_thumbnail' => Storage::disk('s3')->url($this->filename('_thumb')),
            'original_path' => $this->item_path,
            'processed' => 1,
        ]);
    }

    /**
     * Easy path generator for the full file path.
     *
     * @param string $extras
     *
     * @return string
     */
    private function filename($extras = '')
    {
        return "lara_gallery/{$this->album->id}/{$this->id}{$extras}.jpg";
    }

    // RELATIONSHIP

    /**
     * Returns the Album associated with this item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function album()
    {
        return $this->belongsTo(LaraGalleryAlbum::class, 'lara_gallery_album_id');
    }
}