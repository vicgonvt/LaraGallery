<?php

namespace vicgonvt\LaraGallery\Composers;

use vicgonvt\LaraGallery\LaraGalleryAlbum;

class GlobalComposer
{
    public function compose($view)
    {
        $view->with('albums', LaraGalleryAlbum::has('images')->orderBy('album_name', 'ASC')->get());
    }

}