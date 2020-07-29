<?php

namespace ClaudiusNascimento\ModelImages;

use Illuminate\Support\ServiceProvider;

class ModelImagesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'model-images');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'model-images');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->registerHelpers();

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/model-images.php' => config_path('model-images.php'),
            ], 'config');

            // Publishing the views.
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/model-images'),
            ], 'views');

            // Publishing assets.
            $this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/model-images'),
            ], 'assets');

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/model-images'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register helpers file
     */
    public function registerHelpers()
    {
        // Load the helpers in app/Http/helpers.php
        if (file_exists($helper = __DIR__ . '/helpers.php'))
        {
            require $helper;
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/model-images.php', 'model-images');

        // Register the main class to use with the facade
        $this->app->singleton('model-images', function () {
            return new ModelImage;
        });
    }
}
