<?php

namespace Mohammadkhazaee\LaravelHtaccess\Listeners;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mohammadkhazaee\LaravelHtaccess\Events\HtaccessEvent;
use Mohammadkhazaee\LaravelHtaccess\WriteHtaccess;

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
    public function handle(HtaccessEvent $event,WriteHtaccess $write)
    {
        $write->write();
    }
}
