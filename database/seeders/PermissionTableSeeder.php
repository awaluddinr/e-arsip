<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'master-data (menu-utama)',
            'data-user (sub-menu)',
            'tambah-user',
            'edit-user',
            'hapus-user',
            'klasifikasi-surat (sub-menu)',
            'tambah-klasifikasi',
            'edit-klasifikasi',
            'hapus-klasifikasi',
            'persuratan (menu-utama)',
            'surat-masuk (sub-menu)',
            'tambah-surat-masuk',
            'edit-surat-masuk',
            'detail-surat-masuk',
            'hapus-surat-masuk',
            'surat-keluar (sub-menu)',
            'tambah-surat-keluar',
            'edit-surat-keluar',
            'detail-surat-keluar',
            'hapus-surat-keluar',
            'laporan (menu-utama)',
            'laporan-surat-masuk (sub-menu)',
            'laporan-surat-keluar (sub-menu)',
            'pengaturan (menu-utama)',
            'role (sub-menu)',
            'tambah-role',
            'edit-role',
            'detail-role',
            'hapus-role',
            'hak-akses (sub-menu)',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
    }
}
