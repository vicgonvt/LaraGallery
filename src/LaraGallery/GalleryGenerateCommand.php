<?php

namespace vicgonvt\LaraGallery;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class GalleryGenerateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gallery:generate {path} {--C|clean}';

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
    public function handle()
    {
        if ($this->option('clean')) {

            LaraGalleryAlbum::truncate();
            LaraGalleryItem::truncate();

        }

        $directory = glob($this->argument('path') . '/*', GLOB_ONLYDIR);

        $this->info('Processing ' . count($directory) . ' album(s).');

        foreach ($directory as $album) {

            $albumModel = LaraGalleryAlbum::create([
                'album_name' => $album,
            ]);

            $this->line('<info>Album Name: </info>' . $albumModel->album_name);

            $albumModel->getAlbumImages($album)
                ->each(function($image) use ($albumModel) {
                    $albumModel->images()->save(
                        LaraGalleryItem::make([
                            'item_path' => $image
                        ])
                    );
                });
        }
    }
}