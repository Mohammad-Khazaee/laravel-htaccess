<?php

namespace Mohammadkhazaee\LaravelHtaccess;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Mohammadkhazaee\LaravelHtaccess\Events\HtaccessEvent;
use Mohammadkhazaee\LaravelHtaccess\Listeners\EditHtaccessListener;

class LaravelHtaccessEventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        HtaccessEvent::class => [
            EditHtaccessListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
