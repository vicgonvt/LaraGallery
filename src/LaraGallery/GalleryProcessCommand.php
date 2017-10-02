<?php

namespace vicgonvt\LaraGallery;

use Illuminate\Console\Command;

class GalleryProcessCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gallery:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Processes any pending files in the items table';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        ini_set('memory_limit', '1024M');

        $items = LaraGalleryItem::pending()->get();

        $this->info($items->count() . ' items need to be processed.');

        $items->each(function($item) {
            $this->line('<info>Item: </info>' . $item->item_path);

            $item->process();
        });
    }
}