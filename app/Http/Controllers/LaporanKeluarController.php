<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        date_default_timezone_set('Asia/makassar');
    }

    public function index(Request $request)
    {
        $query = SuratKeluar::query();
        // $surat = $query->with('klasifikasis')->get();
        $filter = $request->filter;

        if ($filter && $filter !== 'all_data') {
            switch ($filter) {
                case 'today':
                    $query->whereDate('tanggal_surat', Carbon::today());
                    break;
                case 'yesterday':
                    $query->whereDate('tanggal_surat', Carbon::yesterday());
                    break;
                case 'this_week':
                    $query->whereBetween('tanggal_surat', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                    break;
                case 'last_week':
                    $query->whereBetween('tanggal_surat', [Carbon::now()->subWeek(), Carbon::now()]);
                    break;
                case 'this_month':
                    $query->whereMonth('tanggal_surat', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()]);
                    break;
                case 'last_month':
                    $query->whereMonth('tanggal_surat', [Carbon::now()->subMonth(), Carbon::now()]);
                    break;
                case 'this_year':
                    $query->whereYear('tanggal_surat', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()]);
                    break;
                case 'last_year':
                    $query->whereYear('tanggal_surat', [Carbon::now()->subYear(), Carbon::now()]);
                    break;
            }
        }

        $surat = $query->with(['user', 'klasifikasis'])->get();


        return view('main-layouts.laporan-surat.laporan-surat-keluar', compact('surat', 'filter'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function print_view($print)
    {
        $decodedFilter = base64_decode(urldecode($print));

        $query = SuratKeluar::query();

        if ($decodedFilter && $decodedFilter !== '') {
            switch ($decodedFilter) {
                case 'all_data':
                    $query->with(['user', 'klasifikasis']);
                    break;
                case 'today':
                    $query->whereDate('tanggal_surat', Carbon::today());
                    break;
                case 'yesterday':
                    $query->whereDate('tanggal_surat', Carbon::yesterday());
                    break;
                case 'this_week':
                    $query->whereBetween('tanggal_surat', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                    break;
                case 'last_week':
                    $query->whereBetween('tanggal_surat', [Carbon::now()->subWeek(), Carbon::now()]);
                    break;
                case 'this_month':
                    $query->whereMonth('tanggal_surat', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()]);
                    break;
                case 'last_month':
                    $query->whereMonth('tanggal_surat', [Carbon::now()->subMonth(), Carbon::now()]);
                    break;
                case 'this_year':
                    $query->whereYear('tanggal_surat', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()]);
                    break;
                case 'last_year':
                    $query->whereYear('tanggal_surat', [Carbon::now()->subYear(), Carbon::now()]);
                    break;
            }
        }

        $surat = $query->with(['user', 'klasifikasis'])->get();

        return view('main-layouts.laporan-surat._surat-keluar-print', compact('surat', 'decodedFilter'));
    }
}
