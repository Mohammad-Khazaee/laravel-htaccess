<?php

namespace Mohammadkhazaee\LaravelHtaccess\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mohammadkhazaee\LaravelHtaccess\Events\HtaccessEvent;

class Htaccess extends Model
{
    use HasFactory;

    protected $dispatchesEvents = [
        'saved' =>HtaccessEvent::class,
        'updated' =>HtaccessEvent::class,
        'deleted' =>HtaccessEvent::class,
        'created' =>HtaccessEvent::class,
        'restored'=>HtaccessEvent::class
    ];

}
