<?php

namespace Mohammadkhazaee\LaravelHtaccess\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HtaccessUrl extends Model
{
    use HasFactory;

    public function htaccess()
    {
        return $this->belongsTo(Htaccess::class);
    }

    public function urlType()
    {
        return $this->belongsTo(UrlType::class);
    }
}
