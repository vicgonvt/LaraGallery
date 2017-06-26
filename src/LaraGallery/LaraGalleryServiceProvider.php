<?php

namespace vicgonvt\LaraGallery;

use Illuminate\Support\ServiceProvider;

class LaraGalleryServiceProvider extends ServiceProvider
{

    protected $packageName = 'LaraGallery';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__ . '/../routes.php';

        if ($this->app->runningInConsole()) {

            $this->commands([
                GalleryGenerateCommand::class,
                GalleryProcessCommand::class,
            ]);

        }

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

//        // Register Views from your package
//        $this->loadViewsFrom(__DIR__ . '/../views', $this->packageName);
//
//        // Register your asset's publisher
//        $this->publishes([
//            __DIR__ . '/../assets' => public_path('vendor/' . $this->packageName),
//        ], 'public');
//
//        // Register your migration's publisher
//        $this->publishes([
//            __DIR__ . '/../database/migrations/' => base_path('/database/migrations')
//        ], 'migrations');
//
//        // Publish your seed's publisher
//        $this->publishes([
//            __DIR__ . '/../database/seeds/' => base_path('/database/seeds')
//        ], 'seeds');
//
//        // Publish your config
//        $this->publishes([
//            __DIR__ . '/../config/config.php' => config_path($this->packageName . '.php'),
//        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', $this->packageName);
    }

}
