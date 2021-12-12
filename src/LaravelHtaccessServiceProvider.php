<?php

namespace Mohammadkhazaee\LaravelHtaccess;

use Illuminate\Support\ServiceProvider;
use Mohammadkhazaee\LaravelHtaccess\Console\Commands\htaccessCommand;

class LaravelHtaccessServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/htaccess.php' => config_path('htaccess.php'),
        ]);

        $this->mergeConfigFrom(
            __DIR__.'/config/htaccess.php', 'htaccess'
        );

        $this->commands([
            htaccessCommand::class,
        ]);
    }
}
