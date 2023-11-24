<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $token = Str::random(16);
        $hash_password = Hash::make('admin12345', [
            'rounds' => 12,
        ]);

        $hash_token = Hash::make($token, [
            'rounds' => 12,
        ]);

        $data = [
            'name' => 'administrator',
            'email' => 'adminutama@gmail.com',
            'username' => 'admin_utama',
            'email_verified_at' => now(),
            'password' => $hash_password,
            'remember_token' => $hash_token,
            'created_at' => now(),
            'updated_at' => now()
        ];

        $user = User::create($data);

        $level = 'admin-utama';

        $role = Role::where('name', $level)->get();

        $user->assignRole([$role]);
    }
}
