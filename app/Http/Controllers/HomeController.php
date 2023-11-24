<?php

namespace App\Http\Controllers;

use App\Models\Klasifikasi;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $session_users = session('data_login');
        $users = User::find($session_users->id);
        $nama = 'admin';

        // $count_admin = Role::with('users')->where('name', 'admin')->count();

        // $count_admin = User::Role('admin')->count();

        // cara lama
        // $count_user = User::with('roles')
        //     ->whereNot('name', ['admin-utama', 'admin'])
        //     ->get();

        $count_user = User::doesntHave('roles', 'and', function ($query) {
            $query->whereIn('name', ['admin-utama', 'admin']);
        })->get();

        $klasifikasi = Klasifikasi::get();
        $surat_masuk = SuratMasuk::get();
        $surat_keluar = SuratKeluar::get();


        // $dt = Klasifikasi::with('surat_masuk')->get();

        // dd($dt);


        // $super_admin = Role::with('users')->where('id', $users)->first();

        return view('main-layouts.home.index', compact('count_user', 'klasifikasi', 'surat_masuk', 'surat_keluar'));
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
}
