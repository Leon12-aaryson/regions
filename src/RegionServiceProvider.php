<?php

namespace Vendor\Regions;

use Illuminate\Support\ServiceProvider;

class RegionServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish migrations
        $this->publishes([
            __DIR__.'/database/migrations/' => $this->app->databasePath('migrations'),
        ], 'regions-migrations');

        // Publish seeders
        $this->publishes([
            __DIR__.'/database/seeders/' => $this->app->databasePath('seeders'),
        ], 'regions-seeders');

        // Publish config if you have one
        if (file_exists(__DIR__.'/config/regions.php')) {
            $this->publishes([
                __DIR__.'/config/regions.php' => $this->app->configPath('regions.php'),
            ], 'regions-config');
        }

        // Load routes if you have any
        if (file_exists(__DIR__.'/routes/web.php')) {
            $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        }

        $this->loadRoutesFrom(__DIR__.'/routes/api.php');
    }

    public function register()
    {
        // Merge config if you have one
        if (file_exists(__DIR__.'/config/regions.php')) {
            $this->mergeConfigFrom(
                __DIR__.'/config/regions.php', 'regions'
            );
        }

        if ($this->app->runningInConsole()) {
            $this->commands([
                \Vendor\Regions\Console\PublishAndSeedRegions::class,
                \Vendor\Regions\Console\ShowComposerScript::class, // Add this line
            ]);
        }
    }
}