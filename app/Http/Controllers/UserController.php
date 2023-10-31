<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $faker = Faker::create('id');

        $data = [];

        for ($i = 0; $i < 5; $i++) {
            $datas = [
                'id' => $i + 1,
                'nama' => $faker->name(),
                'username' => $faker->userName(),
                'email' => $faker->safeEmail(),
                'hak-akses' => $faker->randomElement([
                    'administrator',
                    'petugas'
                ])
            ];

            $data = Arr::prepend($data, $datas);
        }


        // $data = [
        //     'id' => 1,
        //     'username' => 'trisno123',
        //     'nama' => 'trisno',
        //     'email' => 'trisno123',
        //     'hak-akses' => 'petugas'
        // ];
        return view('main-layouts.master-data.data-pengguna', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('main-layouts.master-data.tambah-pengguna');
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

        $dt = new UserController;

        $result = $dt->index();
        $a = $result['data'];

        $i = [];

        foreach ($a as $arr) {
            $i[] = $arr;
        }


        return view('main-layouts.master-data.edit-pengguna', ['hasil' => $arr]);
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
