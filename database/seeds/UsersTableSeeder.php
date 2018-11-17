<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;
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
        User::create([
            'username' => 'admin',
            'email' => 'uloszone@gmail.com',
            'password' => bcrypt('admin123'),
            'email_verified_at' => Carbon::now(),
        ]);

        $merchant = User::create([
            'username' => 'merchant',
            'email' => 'merchant@uloszone.com',
            'password' => bcrypt('merchant123'),
            'email_verified_at' => Carbon::now(),
        ]);

        $customer = User::create([
            'username' => 'customer',
            'email' => 'customer@uloszone.com',
            'password' => bcrypt('customer123'),
            'email_verified_at' => Carbon::now(),
        ]);

        Profile::create([
            'user_id' => $customer->id,
            'name' => 'Customer',
            'address' => '[]',
            'phone' => '08123',
            'gender' => 'male',
            'birthday' => '123',
        ]);

        Profile::create([
            'user_id' => $merchant->id,
            'name' => 'Merchant',
            'address' => '[]',
            'phone' => '081234',
            'gender' => 'male',
            'birthday' => '1234',
        ]);
    }
}
