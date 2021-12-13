<?php

namespace Mohammadkhazaee\LaravelHtaccess;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;
use Mohammadkhazaee\LaravelHtaccess\Models\Htaccess;

class WriteHtaccess {

    private $filesystem;

    public function write()
    {

        $requests = [
            '    #start',
            '',
            '    # Redirect requests powered by laravel-htaccess package',
            '    # Author: Mohammad Khazaee', 
            '    # Email: khazaee.md@gmail.com',
            '',
        ];

        $this->filesystem = new Filesystem();
        $htPath = $this->getHtaccessPath();
        $htContents = $this->filesystem->lines($htPath)->toArray();
        $htLastLineMain = $this->getLastIfModuleLine($htContents);
        
        if($this->getEndLine($htContents)){
            for ($htLastLineMain; $htLastLineMain <= $this->getEndLine($htContents); $htLastLineMain++) {
                unset($htContents[$htLastLineMain]);
            }
        }

        // sort keys after unset
        $htContents = array_values($htContents);

        $htLastLine = $this->getLastIfModuleLine($htContents);
        // $htContents = $this->filesystem->lines($htPath)->toArray();
        // $htLastLine = $this->getLastIfModuleLine($htContents);

        $htaccesses = Htaccess::all();
        foreach ($htaccesses as $htaccess) {
          switch ($htaccess->status_code) {
              case 301:
                $from = $htaccess->htaccessUrls()->where('url_type_id',1)->first()->url;
                $to = $htaccess->htaccessUrls()->where('url_type_id',2)->first()->url;
                $redirect = '    RewriteRule 301 ' . $from . ' ' . $to . ' [L]';
                array_push($requests,$redirect);
                break;
              
            //   case 310:

            //     break;
          }  
        }
        
        array_push($requests,'');
        array_push($requests,'    #end');
        array_splice($htContents,$htLastLine,0,$requests);

        $htaccessFile = fopen($htPath, "w") or die("Unable to open file!");
        foreach ($htContents as $key =>  $i) {
            if($key == 0){
                $txt = $i ;
                fwrite($htaccessFile, $txt);    
            }else{
            $txt =  "\n" . $i ;
            fwrite($htaccessFile, $txt);
            }
        }
        
        fclose($htaccessFile);

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
            if($htContent === '    #start'){
                return $key;
            }
        }
        foreach ($htContents as $key => $htContent) {
            if($htContent === '</IfModule>'){
                return $key;
            }
        }
    }

    private function getEndLine($htContents)
    {
        foreach ($htContents as $key => $htContent) {
            if($htContent === '    #end'){
                return $key;
            }
        }

        return false;
    }
}