<?php

namespace App\Http\Controllers;

use App\Models\Klasifikasi;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = SuratKeluar::with(['user', 'klasifikasis'])->get();
        return view('main-layouts.persuratan.surat-keluar', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $klasifikasis = Klasifikasi::get();
        return view('main-layouts.persuratan.tambah-surat-keluar', compact('klasifikasis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $request->validate(
            [
                'no-agenda' => 'required|numeric|unique:surat_keluars,no_agenda',
                'no-surat' => 'required|unique:surat_keluars,no_surat',
                'tujuan_surat' => 'required',
                'klasifikasi' => 'required',
                'perihal' => 'required',
                'tanggal-surat' => 'required|date',
                'dokumen' => 'file'
            ],
            [
                'no-agenda.required' => 'Kolom No. Agenda wajib diisi.',
                'no-agenda.numeric' => 'Kolom No. Agenda harus berupa angka.',
                'no-agenda.unique' => 'No. Agenda sudah digunakan.',

                'no-surat.required' => 'Kolom No. Surat wajib diisi.',
                'no-surat.unique' => 'No. Surat sudah digunakan.',

                'tujuan_surat.required' => 'Kolom Tujuan Surat wajib diisi.',

                'klasifikasi.required' => 'Kolom Klasifikasi wajib diisi.',

                'perihal.required' => 'Kolom Perihal wajib diisi.',

                'tanggal-surat.required' => 'Kolom Tanggal Surat wajib diisi.',
                'tanggal-surat.date' => 'Kolom Tanggal Surat harus berupa tanggal.',
            ]
        );

        $file = $request->file('dokumen');

        if (empty($file)) {
            $pesan = 'Harap memilih file untuk diunggah';
            $title = 'Gagal';
            $icon = 'error';
            return back()->with('status', compact('pesan', 'title', 'icon'));
        }

        if ($file->getClientOriginalExtension() !== 'pdf') {
            $pesan = 'File yang diupload bukan pdf';
            $title = 'Gagal';
            $icon = 'error';
            return back()->with('status', compact('pesan', 'title', 'icon'));
        }

        $ukuranFile = $file->getSize();

        // Maksimum ukuran file yang diizinkan (2MB)
        $maxFileSize = 2 * 1024 * 1024; // 2MB dalam bytes

        if ($ukuranFile >=  $maxFileSize) {
            $pesan = 'File yang diupload lebih dari 2MB';
            $title = 'Gagal';
            $icon = 'error';
            return back()->with('status', compact('pesan', 'title', 'icon'));
        }

        $nama_dok = 'surat' . date('Ymdhis') . '.' . $request->file('dokumen')->getClientOriginalExtension();

        $file->move('assets/dokumen/surat-keluar/', $nama_dok);

        // try {
        //     $file->move('dokumen/surat-masuk/', $nama_dok);
        // } catch (\Exception $e) {
        //     dd($e->getMessage()); // Tampilkan pesan kesalahan
        // }

        $klasifikasi = Klasifikasi::where('nama', $request->klasifikasi)->first();


        SuratKeluar::create([
            'no_agenda' => $rules['no-agenda'],
            'no_surat' => $rules['no-surat'],
            'tujuan_surat' => $rules['tujuan_surat'],
            'tanggal_surat' => $rules['tanggal-surat'],
            'perihal_surat' => $rules['perihal'],
            'file_surat' => $nama_dok,
            'user_id' => Auth::user()->id,
            'klasifikasi_id' => $klasifikasi->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $pesan = 'Data berhasil ditambahkan';
        $title = 'Berhasil';
        $icon = 'success';

        return redirect()->route('surat-keluar')->with('status', compact('pesan', 'title', 'icon'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $surat = SuratKeluar::with(['klasifikasis', 'user'])->where('id', $id)->first();

        $class = 'class=' . "d-none";

        $file = $surat->file_surat;
        $filePath = 'assets/dokumen/surat-keluar/' . $file;

        if (file_exists($filePath)) {
            $sizeInBytes = filesize($filePath);

            // Tentukan satuan yang sesuai
            if ($sizeInBytes < 1024) {
                $size = $sizeInBytes;
                $unit = 'B';
                $hasil = $size . ' ' . $unit;
            } elseif ($sizeInBytes < 1024 * 1024) {
                $size = number_format($sizeInBytes / 1024, 0, '.', ''); // Hilangkan dua angka di belakang koma
                $unit = 'KB';
                $hasil = $size . ' ' . $unit;
            } else {
                $size = number_format($sizeInBytes / 1024, 0, '.', ''); // Hilangkan dua angka di belakang koma
                $unit = 'MB';
                $hasil = $size . ' ' . $unit;
            }
        }
        return view('main-layouts.persuratan.detail-surat-keluar', compact('surat', 'hasil', 'class'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $surat = SuratKeluar::with(['klasifikasis', 'user'])->where('id', $id)->first();
        $klasifikasis = Klasifikasi::get();
        return view('main-layouts.persuratan.edit-surat-keluar', compact('surat', 'klasifikasis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $surat = SuratKeluar::find($id);

        $suratSebelum = SuratKeluar::with('klasifikasis')->find($id);

        $klasifikasi = Klasifikasi::where('id', $surat->klasifikasi_id)->first();

        $rules = [
            'tujuan_surat' => 'required',
            'perihal_surat' => 'required',
            'tanggal_surat' => 'required|date',
            'file_surat' => 'file'
        ];

        if ($request->no_agenda != $surat->no_agenda) {
            $rules['no_agenda'] = 'required|numeric|unique:surat_keluars,no_agenda';
        }

        if ($request->no_surat != $surat->no_surat) {
            $rules['no_surat'] = 'required|unique:surat_keluars,no_surat';
        }

        if ($request->klasifikasi_id != $klasifikasi->nama) {
            $rules['klasifikasi_id'] = 'required';
        }
        $file = $request->file('file_surat');


        $customMessage = [
            'no_agenda.required' => 'Kolom No. Agenda wajib diisi.',
            'no_agenda.numeric' => 'Kolom No. Agenda harus berupa angka.',
            'no_agenda.unique' => 'No. Agenda sudah digunakan.',

            'no_surat.required' => 'Kolom No. Surat wajib diisi.',
            'no_surat.unique' => 'No. Surat sudah digunakan.',

            'tujuan_surat.required' => 'Kolom Tujuan Surat wajib diisi.',

            'klasifikasi_id.required' => 'Kolom Klasifikasi wajib diisi.',

            'perihal_surat.required' => 'Kolom Perihal wajib diisi.',

            'tanggal_surat.required' => 'Kolom Tanggal Surat wajib diisi.',
            'tanggal_surat.date' => 'Kolom Tanggal Surat harus berupa tanggal.',
        ];

        $validatedData = $request->validate($rules, $customMessage);

        if ($file) {
            if ($file->getClientOriginalExtension() !== 'pdf') {
                $pesan = 'File yang diupload bukan pdf';
                $title = 'Gagal';
                $icon = 'error';
                return back()->with('status', compact('pesan', 'title', 'icon'));
            }

            $ukuranFile = $file->getSize();

            // Maksimum ukuran file yang diizinkan (2MB)
            $maxFileSize = 2 * 1024 * 1024; // 2MB dalam bytes

            if ($ukuranFile >=  $maxFileSize) {
                $pesan = 'File yang diupload lebih dari 2MB';
                $title = 'Gagal';
                $icon = 'error';
                return back()->with('status', compact('pesan', 'title', 'icon'));
            }

            $tmp = 'assets/dokumen/surat-keluar/' . $surat->file_surat;

            if (File::exists($tmp)) {
                File::delete($tmp);
            }

            $extension = $file->getClientOriginalExtension();
            $nama_dok = 'surat' . date('Ymdhis') . '.' . $extension;
            $file->move('assets/dokumen/surat-keluar/', $nama_dok);
            $validatedData['file_surat'] = $nama_dok;
        }

        SuratKeluar::where('id', $surat->id)->update($validatedData);

        $suratSesudah = SuratKeluar::with('klasifikasis')->find($id);

        // cek apakah ada perubahan data

        $adaPerubahan = $suratSebelum->getOriginal('no_agenda') !== $suratSesudah->no_agenda
            || $suratSebelum->getOriginal('no_surat') !== $suratSesudah->no_surat
            || $suratSebelum->getOriginal('tujuan_surat') !== $suratSesudah->tujuan_surat
            || $suratSebelum->getOriginal('tanggal_surat') !== $suratSesudah->tanggal_surat
            || $suratSebelum->getOriginal('file_surat') !== $suratSesudah->file_surat
            || $suratSebelum->klasifikasis->getOriginal('nama') !== $suratSesudah->klasifikasis->nama;

        if ($adaPerubahan) {
            $pesan = 'Data berhasil diubah';
            $title = 'Berhasil';
            $icon = 'success';
            return redirect()->route('surat-keluar')->with('status', compact('pesan', 'title', 'icon'));
        } else {
            return redirect()->route('surat-keluar');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = SuratKeluar::find($id);

        $file = public_path('assets/dokumen/surat-keluar/' . $delete->file_surat);

        if (file_exists($file)) {
            unlink($file);
        }
        $delete->delete();

        $pesan = 'Data berhasil dihapus';
        $title = 'Berhasil';
        $icon = 'success';

        return redirect()->route('surat-keluar')->with('status', compact('pesan', 'title', 'icon'));
    }

    public function lihatPdf($id)
    {
        $data = SuratKeluar::find($id);

        $filePath = public_path('assets/dokumen/surat-keluar/' . $data->file_surat);

        $filename = 'surat' . '.pdf';

        if (file_exists($filePath)) {
            $headers = [
                // 'Content-Disposition' => 'attachment; filename="' . $filename . '"',
                // 'X-Content-Type-Options' => 'nosniff',

                'Content-Type' => $data->content_type,
                'Content-Disposition' => 'inline; filename="' . $data->file_name . '"',
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
            ];

            return response()->file($filePath, $headers);
        }
        // return Response::download($filePath, [
        //     'Content-Disposition' => 'attachment; filename="' . $data->file_surat . '"',
        //     'X-Content-Type-Options' => 'nosniff',
        // ]);
    }

    public function download($id)
    {
        $data = SuratKeluar::find($id);

        $filePath = public_path('assets/dokumen/surat-keluar/' . $data->file_surat);

        if (file_exists($filePath)) {
            $headers = [
                'Content-Disposition' => 'attachment; filename="' . $data->file_surat . '"',
                'X-Content-Type-Options' => 'nosniff',

                // 'Content-Type' => $data->content_type,
                // 'Content-Disposition' => 'inline; filename="' . $data->file_name . '"',
                // 'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
            ];

            return response()->download($filePath, $data->file_surat, $headers);
        }
    }
}
