<?php

namespace Database\Seeders;

use App\Models\InfoAkses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InfoAksesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $infoAkses = [
            [
                'menu_utama' => 'master-data',
                'sub_menu' => 'data-user',
                'hak_akses' => 'tambah-user'
            ],
            [
                'menu_utama' => 'master-data',
                'sub_menu' => 'data-user',
                'hak_akses' => 'edit-user'
            ],
            [
                'menu_utama' => 'master-data',
                'sub_menu' => 'data-user',
                'hak_akses' => 'hapus-user'
            ],

            [
                'menu_utama' => 'master-data',
                'sub_menu' => 'klasifikasi',
                'hak_akses' => 'tambah-klasifikasi'
            ],
            [
                'menu_utama' => 'master-data',
                'sub_menu' => 'klasifikasi',
                'hak_akses' => 'edit-klasifikasi'
            ],
            [
                'menu_utama' => 'master-data',
                'sub_menu' => 'klasifikasi',
                'hak_akses' => 'hapus-klasifikasi'
            ],
            [
                'menu_utama' => 'persuratan',
                'sub_menu' => 'surat-masuk',
                'hak_akses' => 'tambah-surat-masuk'
            ],
            [
                'menu_utama' => 'persuratan',
                'sub_menu' => 'surat-masuk',
                'hak_akses' => 'edit-surat-masuk'
            ],
            [
                'menu_utama' => 'persuratan',
                'sub_menu' => 'surat-masuk',
                'hak_akses' => 'hapus-surat-masuk'
            ],
            [
                'menu_utama' => 'persuratan',
                'sub_menu' => 'surat-masuk',
                'hak_akses' => 'detail-surat-masuk'
            ],
            [
                'menu_utama' => 'persuratan',
                'sub_menu' => 'surat-keluar',
                'hak_akses' => 'tambah-surat-keluar'
            ],
            [
                'menu_utama' => 'persuratan',
                'sub_menu' => 'surat-keluar',
                'hak_akses' => 'edit-surat-keluar'
            ],
            [
                'menu_utama' => 'persuratan',
                'sub_menu' => 'surat-keluar',
                'hak_akses' => 'hapus-surat-keluar'
            ],
            [
                'menu_utama' => 'persuratan',
                'sub_menu' => 'surat-keluar',
                'hak_akses' => 'detail-surat-keluar'
            ],
            [
                'menu_utama' => 'laporan',
                'sub_menu' => 'laporan-surat-masuk',
                'hak_akses' => 'laporan-surat-masuk'
            ],
            [
                'menu_utama' => 'laporan',
                'sub_menu' => 'laporan-surat-keluar',
                'hak_akses' => 'laporan-surat-keluar'
            ],
            [
                'menu_utama' => 'pengaturan',
                'sub_menu' => 'role',
                'hak_akses' => 'tambah-role'
            ],
            [
                'menu_utama' => 'pengaturan',
                'sub_menu' => 'role',
                'hak_akses' => 'edit-role'
            ],
            [
                'menu_utama' => 'pengaturan',
                'sub_menu' => 'role',
                'hak_akses' => 'detail-role'
            ],
            [
                'menu_utama' => 'pengaturan',
                'sub_menu' => 'role',
                'hak_akses' => 'hapus-role'
            ],
            [
                'menu_utama' => 'pengaturan',
                'sub_menu' => 'hak-akses',
                'hak_akses' => 'hak-akses'
            ],

        ];

        foreach ($infoAkses as $info) {
            InfoAkses::create($info);
        }
    }
}
