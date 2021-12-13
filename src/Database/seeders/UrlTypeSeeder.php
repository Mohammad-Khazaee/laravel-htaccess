<?php

namespace Mohammadkhazaee\LaravelHtaccess\Database\Seeders;

use Illuminate\Database\Seeder;
use Mohammadkhazaee\LaravelHtaccess\Models\UrlType;

class UrlTypeSeeder extends Seeder
{
    private const DATA = [
        [
            1,
            'from',
        ],
        [
            2,
            'to',
        ],
        [
            3,
            '310'
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::DATA as $value) {
            UrlType::updateOrCreate(
                ['id',$value[0]],
                ['name',$value[1]]
            );
        }
    }
}
