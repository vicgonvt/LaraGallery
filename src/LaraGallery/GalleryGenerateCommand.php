<?php

namespace vicgonvt\LaraGallery;

use Illuminate\Console\Command;

class GalleryGenerateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gallery:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates the initial library';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $libraryRoot = '/Users/victor/Desktop/testing-gallery';

        Album::truncate();
        Image::truncate();

        foreach (glob($libraryRoot . '/*') as $album) {

            $albumModel = Album::create([
                'album_name' => $album,
            ]);

            $albumModel->getAlbumImages()
                ->each(function($image) use ($albumModel) {
                    $albumModel->images()->save(
                        Image::make([
                            'image_name' => $image
                        ])
                    );
                });

        }
    }
}