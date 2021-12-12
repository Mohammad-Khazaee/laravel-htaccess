<?php

namespace Mohammadkhazaee\LaravelHtaccess\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class htaccessCommand extends GeneratorCommand
{

    protected $signature = 'generate:htaccess {name=htaccess} {--force=true}';

    protected $description = 'replace main htaccess with modified htaccess';

    protected $type = '.htaccess';


    protected function getStub()
    {
        return  __DIR__ . '/../../Stubs/htaccess.stub';
    }

    
    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return public_path().'/.' . str_replace('\\', '/', $name);
    }
}