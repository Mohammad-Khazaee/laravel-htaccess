<?php

namespace Mohammadkhazaee\LaravelHtaccess\Console\Commands;

use Illuminate\Console\Command;
use Mohammadkhazaee\LaravelHtaccess\Models\UrlType;

class AddDefaultDataToUrlTypeModelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'htaccess:addUrlTypes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'add default value to url_types model';


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach (config('htaccess')['url_types'] as $value) {
            UrlType::updateOrCreate(
                ['id'=>$value[0]],
                ['name'=>$value[1]]
            );
        }
        
        return Command::SUCCESS;
    }
}
