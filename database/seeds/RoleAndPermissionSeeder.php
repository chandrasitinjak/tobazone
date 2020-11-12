<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        Permission::create(['name' => 'all']);

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

        $user = User::find(1);
        $user->assignRole('admin');

        Role::create(['name' => 'merchant']);
        $user = User::find(2);
        $user->assignRole('merchant');

        Role::create(['name' => 'customer']);
        $user = User::find(3);
        $user->assignRole('customer');

        Role::create(['name' => 'member_cbt']);
        $user = User::find(4);
        $user->assignRole('member_cbt');
    }
}
