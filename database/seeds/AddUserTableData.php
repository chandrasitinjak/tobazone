<?php

use Illuminate\Database\Seeder;

class AddUserTableData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $CBT = User::create([
            'username' => 'cbt',
            'email' => 'cbt@uloszone.com',
            'password' => bcrypt('cbt123'),
            'status' => 'verifiedByAdmin',
            'email_verified_at' => Carbon::now(),
        ]);


        Member::create([
            'user_id' => $CBT->id,
            'no_KTP' => "nomor ktp"
        ]);
    }
}
