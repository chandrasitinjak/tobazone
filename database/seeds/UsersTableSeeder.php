<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'uloszone@gmail.com',
            'password' => bcrypt('admin123'),
            'email_verified_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'username' => 'merchant',
            'email' => 'merchant@uloszone.com',
            'password' => bcrypt('merchant123'),
            'email_verified_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'username' => 'customer',
            'email' => 'customer@uloszone.com',
            'password' => bcrypt('customer123'),
            'email_verified_at' => Carbon::now(),
        ]);
    }
}
