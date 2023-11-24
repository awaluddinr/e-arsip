<?php

namespace Database\Seeders;

use App\Models\Klasifikasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KlasifikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $klasifikasis = [
            'Surat Undangan',
            'Surat Keputusan',
            'Surat Pemberitahuan',
            'Surat Izin',
            'Surat Perintah',
            'Surat Permohonan',
            'Surat Tugas',
            'Surat Keterangan',
            'Surat Balasan',
            'Surat Pengantar'
        ];

        foreach ($klasifikasis as $klasifikasi) {
            Klasifikasi::create([
                'nama' => $klasifikasi
            ]);
        }
    }
}
