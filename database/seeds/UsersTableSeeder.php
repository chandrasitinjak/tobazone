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
        $admin = User::create([
            'id' => 1,
            'username' => 'admin',
            'email' => 'uloszone@gmail.com',
            'password' => bcrypt('admin123'),
            'status' => 'verifiedByAdmin',
            'email_verified_at' => Carbon::now(),
        ]);

        $merchant = User::create([
            'id' => 2,
            'username' => 'merchant',
            'email' => 'merchant@uloszone.com',
            'password' => bcrypt('merchant123'),
            'status' => 'verifiedByAdmin',
            'email_verified_at' => Carbon::now(),
        ]);

        $customer = User::create([
            'id' => 3,
            'username' => 'customer',
            'email' => 'customer@uloszone.com',
            'password' => bcrypt('customer123'),
            'status' => 'verifiedByAdmin',
            'email_verified_at' => Carbon::now(),
        ]);

        Profile::create([
            'user_id' => $customer->id,
            'name' => 'Customer',
            'address' => '["{\"name\":null,\"province_id\":34,\"city_id\":481,\"subdistrict_id\":\"6657\",\"province_name\":\"Sumatera Utara\",\"city_name\":\"Toba Samosir\",\"subdistrict_name\":\"Laguboti\",\"postal_code\":\"22316\",\"detail\":\"Simpang Empat Laguboti\"}"]',
            'phone' => '08123',
            'gender' => 'male',
            'birthday' => Carbon::now(),
        ]);

        Profile::create([
            'user_id' => $merchant->id,
            'name' => 'Merchant',
            'address' => '["{\"name\":null,\"province_id\":34,\"city_id\":481,\"subdistrict_id\":\"6657\",\"province_name\":\"Sumatera Utara\",\"city_name\":\"Toba Samosir\",\"subdistrict_name\":\"Laguboti\",\"postal_code\":\"22316\",\"detail\":\"Simpang Empat Laguboti\"}"]',
            'phone' => '081234',
            'gender' => 'male',
            'birthday' => Carbon::now(),
        ]);

        Profile::create([
            'user_id' => $admin->id,
            'name' => 'Admin',
            'address' => '["{\"name\":null,\"province_id\":34,\"city_id\":481,\"subdistrict_id\":\"6657\",\"province_name\":\"Sumatera Utara\",\"city_name\":\"Toba Samosir\",\"subdistrict_name\":\"Laguboti\",\"postal_code\":\"22316\",\"detail\":\"Simpang Empat Laguboti\"}"]',
            'phone' => '081234',
            'gender' => 'male',
            'birthday' => Carbon::now(),
        ]);
    }
}
