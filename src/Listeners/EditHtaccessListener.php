<?php

namespace Mohammadkhazaee\LaravelHtaccess\Listeners;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mohammadkhazaee\LaravelHtaccess\Events\HtaccessEvent;

class EditHtaccessListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\HtaccessEvent  $event
     * @return void
     */
    public function handle(HtaccessEvent $event)
    {
        sleep(10);
        echo 'sldjf;asfja;sdlfja;sfasd';
        
    }
}
