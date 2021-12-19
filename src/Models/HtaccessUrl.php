<?php

namespace Mohammadkhazaee\LaravelHtaccess\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HtaccessUrl extends Model
{
    use HasFactory;

    protected $fillable = [
        'htaccess_id',
        'url',
        'url_type_id',
    ];


    public function htaccess()
    {
        return $this->belongsTo(Htaccess::class);
    }

    public function urlType()
    {
        return $this->belongsTo(UrlType::class);
    }
}
