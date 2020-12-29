<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class UlosColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\UlosColors::insert([
            [
                'color' => 'Merah',
            ],
            [
                'color' => 'Biru',
            ],
            [
                'color' => 'Putih',
            ],
            [
                'color' => 'Ungu',
            ],
            [
                'color' => 'Hijau',
            ],
            [
                'color' => 'Cokelat',
            ],
            [
                'color' => 'Kuning',
            ],
            [
                'color' => 'Silver',
            ],
            [
                'color' => 'Pink',
            ],
            [
                'color' => 'Maroon',
            ],

        ]);
    }
}
