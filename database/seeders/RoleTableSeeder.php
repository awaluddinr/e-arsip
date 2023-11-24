<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $role = Role::findOrFail(1);

        // $permission = Permission::all();

        // $role->givePermissionTo($permission);



        $role = Role::create(['name' => 'admin-utama']);

        $permissions = Permission::all();
        // $permissions2 = Permission::findOrFail(2);
        // $permissions3 = Permission::findOrFail(3);

        $role->syncPermissions($permissions);
    }
}
