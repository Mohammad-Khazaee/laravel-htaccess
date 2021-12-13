<?php

namespace Mohammadkhazaee\LaravelHtaccess;

use Illuminate\Support\ServiceProvider;
use Mohammadkhazaee\LaravelHtaccess\Console\Commands\AddDefaultDataToUrlTypeModelCommand;
use Mohammadkhazaee\LaravelHtaccess\Console\Commands\htaccessCommand;
use Mohammadkhazaee\LaravelHtaccess\Events\HtaccessEvent;
use Mohammadkhazaee\LaravelHtaccess\Listeners\EditHtaccessListener;

class LaravelHtaccessServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(LaravelHtaccessEventServiceProvider::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->publishes([
            __DIR__.'/Config/htaccess.php' => config_path('htaccess.php' , 'htaccess'),
        ]);

        $this->mergeConfigFrom(
            __DIR__.'/Config/htaccess.php', 'htaccess'
        );

        $this->loadMigrationsFrom(__DIR__.'/Database/migrations');

        $this->commands([
            htaccessCommand::class,
            AddDefaultDataToUrlTypeModelCommand::class
        ]);
    }
}
