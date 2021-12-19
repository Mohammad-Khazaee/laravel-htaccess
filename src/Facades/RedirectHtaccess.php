<?php 

namespace Mohammadkhazaee\LaravelHtaccess\Facades;

use Illuminate\Support\Facades\Facade;
use Mohammadkhazaee\LaravelHtaccess\Models\Htaccess;
use Mohammadkhazaee\LaravelHtaccess\Models\HtaccessUrl;

class RedirectHtaccess extends Facade{
    
    protected static function getFacadeAccessor()
    {
        return 'redirectHtaccess';
    }

    public static function add(int $code,$name,$from,$to): Htaccess
    {
        $htaccess = Htaccess::create([
            'status_code' => $code,
            'name' => $name,
        ]);

        HtaccessUrl::create([
            'htaccess_id' => $htaccess->id,
            'url' => $from,
            'url_type_id' => 1
        ]);

        HtaccessUrl::create([
            'htaccess_id' => $htaccess->id,
            'url' => $to,
            'url_type_id' => 2
        ]);

        return $htaccess;
    }
}