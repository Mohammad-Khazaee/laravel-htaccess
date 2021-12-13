<?php

namespace Mohammadkhazaee\LaravelHtaccess\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'id'
    ];

    public function htaccessUrls()
    {
        return $this->hasMany(HtaccessUrl::class);
    }
}
