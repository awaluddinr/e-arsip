<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keluars', function (Blueprint $table) {
            $table->id();
            $table->string('no_agenda');
            $table->string('no_surat');
            $table->string('tujuan_surat');
            $table->date('tanggal_surat');
            $table->string('perihal_surat');
            $table->text('file_surat'); // Ini bisa diubah sesuai kebutuhan, misalnya menggunakan tipe data 'text' untuk menyimpan path file
            //relasi dengan tabel user
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();

            // Relasi dengan tabel klasifikasi
            $table->foreignId('klasifikasi_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_keluars');
    }
};
