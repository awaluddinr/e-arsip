<?php

namespace App\Http\Controllers;

use App\Models\Klasifikasi;
use App\Models\SuratMasuk;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klasifikasi = Klasifikasi::with('surat_masuks')->get();
        $user = SuratMasuk::with(['user', 'klasifikasis'])->get();

        // dd($user);
        return view('main-layouts.persuratan.surat-masuk', compact('user', 'klasifikasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $klasifikasis = Klasifikasi::get();
        return view('main-layouts.persuratan.tambah-surat-masuk', compact('klasifikasis'));
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
                'no-agenda' => 'required|numeric|unique:surat_masuks,no_agenda',
                'no-surat' => 'required|unique:surat_masuks,no_surat',
                'asal' => 'required',
                'klasifikasi' => 'required',
                'perihal' => 'required',
                'tanggal-diterima' => 'required|date',
                'tanggal-surat' => 'required|date',
                'dokumen' => 'file'
            ],
            [
                'no-agenda.required' => 'Kolom No. Agenda wajib diisi.',
                'no-agenda.numeric' => 'Kolom No. Agenda harus berupa angka.',
                'no-agenda.unique' => 'No. Agenda sudah digunakan.',

                'no-surat.required' => 'Kolom No. Surat wajib diisi.',
                'no-surat.unique' => 'No. Surat sudah digunakan.',

                'asal.required' => 'Kolom Asal Surat wajib diisi.',

                'klasifikasi.required' => 'Kolom Klasifikasi wajib diisi.',

                'perihal.required' => 'Kolom Perihal wajib diisi.',

                'tanggal-diterima.required' => 'Kolom Tanggal Diterima wajib diisi.',
                'tanggal-diterima.date' => 'Kolom Tanggal Diterima harus berupa tanggal.',

                'tanggal-surat.required' => 'Kolom Tanggal Surat wajib diisi.',
                'tanggal-surat.date' => 'Kolom Tanggal Surat harus berupa tanggal.',

                'dokumen.file' => 'Kolom Dokumen harus berupa file.',
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

        $file->move('assets/dokumen/surat-masuk/', $nama_dok);

        // try {
        //     $file->move('dokumen/surat-masuk/', $nama_dok);
        // } catch (\Exception $e) {
        //     dd($e->getMessage()); // Tampilkan pesan kesalahan
        // }

        $klasifikasi = Klasifikasi::where('nama', $request->klasifikasi)->first();


        SuratMasuk::create([
            'no_agenda' => $rules['no-agenda'],
            'no_surat' => $rules['no-surat'],
            'asal_surat' => $rules['asal'],
            'tanggal_diterima_surat' => $rules['tanggal-diterima'],
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

        return redirect()->route('surat-masuk')->with('status', compact('pesan', 'title', 'icon'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $surat = SuratMasuk::with(['klasifikasis', 'user'])->where('id', $id)->first();

        $file = $surat->file_surat;
        $filePath = 'assets/dokumen/surat-masuk/' . $file;

        if (file_exists($filePath)) {
            $sizeInBytes = filesize($filePath);

            // Tentukan satuan yang sesuai
            if ($sizeInBytes < 1024) {
                $size = $sizeInBytes;
                $unit = 'B';
                $hasil = $size . ' ' . $unit;
            } elseif ($sizeInBytes < 1024 * 1024) {
                $size = number_format($sizeInBytes / 1024, 1, '.', ''); // Hilangkan dua angka di belakang koma
                $unit = 'KB';
                $hasil = $size . ' ' . $unit;
            } else {
                $size = number_format($sizeInBytes / (1024 * 1024), 1, '.', ''); // Hilangkan dua angka di belakang koma
                $unit = 'MB';
                $hasil = $size . ' ' . $unit;
            }
        }

        // $fileSizeInBytes = Storage::disk('local')->size($filePath); // Ukuran dalam byte
        // $fileSizeInKilobytes = $fileSizeInBytes / 1024; // Ukuran dalam kilobyte
        // $fileSizeInMegabytes = $fileSizeInBytes / (1024 * 1024); // Ukuran dalam megabyte

        return view('main-layouts.persuratan.detail-surat-masuk', compact('surat', 'hasil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $surat = SuratMasuk::with(['klasifikasis', 'user'])->where('id', $id)->first();



        $klasifikasis = Klasifikasi::get();
        // $path = url('assets/file/' . $pdf);

        // if (file_exists($pdf)) {
        //     $file = file_get_contents($pdf);
        //     $response = Response::make($file, 200);
        //     $response->header('Content-Type', 'application/pdf');
        //     $response->header('Content-Disposition', 'inline; filename="' . $pdf . '"');
        //     return $response;
        // }
        return view('main-layouts.persuratan.edit-surat-masuk', compact('surat', 'klasifikasis'));
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
        $surat = SuratMasuk::find($id);

        $suratSebelum = SuratMasuk::with('klasifikasis')->find($id);

        $klasifikasi = Klasifikasi::where('id', $surat->klasifikasi_id)->first();

        $rules = [
            'asal_surat' => 'required',
            'perihal_surat' => 'required',
            'tanggal_diterima_surat' => 'required|date',
            'tanggal_surat' => 'required|date',
            'file_surat' => 'file'
        ];



        if ($request->no_agenda != $surat->no_agenda) {
            $rules['no_agenda'] = 'required|numeric|unique:surat_masuks,no_agenda';
        }

        if ($request->no_surat != $surat->no_surat) {
            $rules['no_surat'] = 'required|unique:surat_masuks,no_surat';
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

            'asal_surat.required' => 'Kolom Asal Surat wajib diisi.',

            'klasifikasi_id.required' => 'Kolom Klasifikasi wajib diisi.',

            'perihal_surat.required' => 'Kolom Perihal wajib diisi.',

            'tanggal-diterima_surat.required' => 'Kolom Tanggal Diterima wajib diisi.',
            'tanggal-diterima_surat.date' => 'Kolom Tanggal Diterima harus berupa tanggal.',

            'tanggal-surat.required' => 'Kolom Tanggal Surat wajib diisi.',
            'tanggal-surat.date' => 'Kolom Tanggal Surat harus berupa tanggal.',
        ];

        $validatedData = $request->validate($rules, $customMessage);
        if ($file) {
            //     $rules['dokumen'] = 'required|file|mimes:pdf|max:2048';
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
            $tmp = 'assets/dokumen/surat-masuk/' . $surat->file_surat;

            if (File::exists($tmp)) {
                File::delete($tmp);
            }



            $extension = $file->getClientOriginalExtension();
            $nama_dok = 'surat' . date('Ymdhis') . '.' . $extension;
            $file->move('assets/dokumen/surat-masuk/', $nama_dok);
            $validatedData['file_surat'] = $nama_dok;
        }

        SuratMasuk::where('id', $surat->id)->update($validatedData);

        $suratSesudah = SuratMasuk::with('klasifikasis')->find($id);

        // cek apakah ada perubahan data

        $adaPerubahan = $suratSebelum->getOriginal('no_agenda') !== $suratSesudah->no_agenda
            || $suratSebelum->getOriginal('no_surat') !== $suratSesudah->no_surat
            || $suratSebelum->getOriginal('asal_surat') !== $suratSesudah->asal_surat
            || $suratSebelum->getOriginal('tanggal_diterima_surat') !== $suratSesudah->tanggal_diterima_surat
            || $suratSebelum->getOriginal('tanggal_surat') !== $suratSesudah->tanggal_surat
            || $suratSebelum->getOriginal('file_surat') !== $suratSesudah->file_surat
            || $suratSebelum->klasifikasis->getOriginal('nama') !== $suratSesudah->klasifikasis->nama;

        if ($adaPerubahan) {
            $pesan = 'Data berhasil diubah';
            $title = 'Berhasil';
            $icon = 'success';
            return redirect()->route('surat-masuk')->with('status', compact('pesan', 'title', 'icon'));
        } else {
            return redirect()->route('surat-masuk');
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
        $delete = SuratMasuk::find($id);

        $file = public_path('assets/dokumen/surat-masuk/' . $delete->file_surat);

        if (file_exists($file)) {
            unlink($file);
        }
        $delete->delete();

        $pesan = 'Data berhasil dihapus';
        $title = 'Berhasil';
        $icon = 'success';

        return redirect()->back()->with('status', compact('pesan', 'title', 'icon'));
    }

    public function lihatPdf($id)
    {
        $data = SuratMasuk::find($id);

        $filePath = public_path('assets/dokumen/surat-masuk/' . $data->file_surat);

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
        $data = SuratMasuk::find($id);

        $filePath = public_path('assets/dokumen/surat-masuk/' . $data->file_surat);

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
