<?php

namespace Mohammadkhazaee\LaravelHtaccess;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;

class WriteHtaccess {

    private $filesystem;

    public function write()
    {
        $this->filesystem = new Filesystem();
        $htPath = $this->getHtaccessPath();
        $htContents = $this->filesystem->lines($htPath)->toArray();
        $htLastLine = $this->getLastIfModuleLine($htContents);
        dd($htLastLine);
    }

    private function getHtaccessPath()
    {
        if($this->filesystem->exists(public_path('.htaccess'))){
            return public_path('.htaccess');
        }
        
        Artisan::call('htaccess:generate');

        return public_path('.htaccess');
    }

    private function getLastIfModuleLine($htContents)
    {
        foreach ($htContents as $key => $htContent) {
            if($htContent === '</IfModule>'){
                return $key;
            }
        }
    }
}