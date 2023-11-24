<?php

namespace App\Http\Controllers;

use App\Models\Klasifikasi;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class KlasifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klasifikasis = Klasifikasi::get();

        return view('main-layouts.master-data.klasifikasi-surat', compact('klasifikasis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $klasifikasi = Klasifikasi::get()->first();

        if (empty($request->nama)) {
            $pesan = 'Harap Masukan Nama Klasifikasi';
            $title = 'Gagal';
            $icon = 'error';

            return back()->with('status', compact('pesan', 'title', 'icon'));
        }

        $rules = $request->validate([
            'nama' => 'required|string|unique:klasifikasis,nama',
        ]);

        Klasifikasi::create([
            'nama' => $rules['nama'],
            'created_at' => now(),
            'updated_at' => now()
        ]);


        $pesan = 'Data berhasil ditambahkan';
        $title = 'Berhasil';
        $icon = 'success';

        return back()->with('status', compact('pesan', 'title', 'icon'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Klasifikasi  $klasifikasi
     * @return \Illuminate\Http\Response
     */
    public function show(Klasifikasi $klasifikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Klasifikasi  $klasifikasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Klasifikasi $klasifikasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Klasifikasi  $klasifikasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Klasifikasi $klasifikasi)
    {

        $existingData = Klasifikasi::where('nama', $request->nama)
            ->where('id', '<>', $klasifikasi->id)
            ->first();

        if ($existingData) {
            // Jika data dengan nama yang sama tapi ID yang berbeda ditemukan
            $pesan = 'Data tidak diubah karena nama sudah ada di database';
            $title = 'Gagal';
            $icon = 'error';

            return back()->with('status', compact('pesan', 'title', 'icon'));
        }

        if (empty($request->nama)) {
            $pesan = 'Harap Masukan Nama Klasifikasi';
            $title = 'Gagal';
            $icon = 'error';

            return back()->with('status', compact('pesan', 'title', 'icon'));
        }


        if ($request->nama != $klasifikasi->nama) {
            $validatedData = $request->validate([
                'nama' => 'required'
            ]);

            Klasifikasi::where('id', $klasifikasi->id)->update($validatedData);
        }


        $klas = Klasifikasi::where('id', $klasifikasi->id)->first();

        $adaPerubahan = $klasifikasi->nama !== $klas->nama;

        if ($adaPerubahan) {
            $pesan = 'Data berhasil diubah';
            $title = 'Berhasil';
            $icon = 'success';

            return back()->with('status', compact('pesan', 'title', 'icon'));
        } else {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Klasifikasi  $klasifikasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Klasifikasi $klasifikasi)
    {
        Klasifikasi::find($klasifikasi->id)->delete();

        $pesan = 'Data berhasil dihapus';
        $title = 'Berhasil';
        $icon = 'success';

        return back()->with('status', compact('pesan', 'title', 'icon'));
    }
}
