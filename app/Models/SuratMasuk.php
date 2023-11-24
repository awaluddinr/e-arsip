<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_agenda',
        'no_surat',
        'asal_surat',
        'tanggal_diterima_surat',
        'tanggal_surat',
        'perihal_surat',
        'file_surat',
        'user_id',
        'klasifikasi_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function klasifikasis()
    {
        return $this->belongsTo(Klasifikasi::class, 'klasifikasi_id');
    }
}
