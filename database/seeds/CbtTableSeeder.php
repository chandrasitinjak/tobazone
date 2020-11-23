<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class CbtTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Cbt::insert([
            [
                'kabupaten_id' => 1,
                'nama' => 'Andreas Tampubolon',
                'email' => 'andreasjr61@gmail.com',
                'password' => 'macan123',
                'no_hp' => '082248953434',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kabupaten_id' => 2,
                'nama' => 'Jansen Tampubolon',
                'email' => 'jansen@gmail.com',
                'password' => 'macan123',
                'no_hp' => '082248953434',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kabupaten_id' => 3,
                'nama' => 'CBT',
                'email' => 'cbt@gmail.com',
                'password' => 'cbt',
                'no_hp' => '082248953434',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
