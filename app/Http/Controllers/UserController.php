<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use App\Models\User;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Spatie\Permission\Middleware\RoleMiddleware;



class UserController extends Controller
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
        $id = $users->id;

        $data = User::whereNot('id', $id)->with('roles')->whereNot('name', 'admin-utama')->get();

        return view('main-layouts.master-data.data-pengguna', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::whereNot('name', 'admin-utama')->orderBy('id', 'asc')->pluck('name', 'id')->all();

        // dd($roles);
        return view('main-layouts.master-data.tambah-pengguna', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);

        // $token = Str::random(16);
        // $hash_token = Hash::make($token, [
        //     'rounds' => 12,
        // ]);


        $data = $request->validate(
            [
                'nama' => 'required|max:255',
                'email' => 'required|email|unique:users',
                'username' => 'required|regex:/^[a-zA-Z0-9_]+$/|unique:users,username',
                'hak-akses' => 'required',
                'password' => 'required|min:8|confirmed',
                'password_confirmation' => 'required|'
            ],
            [
                'nama.required' => 'Kolom nama wajib diisi',
                'nama.max' => 'Kolom nama tidak boleh lebih dari :max karakter.',

                'email.required' => 'Kolom email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email sudah digunakan oleh pengguna lain.',

                'username.required' => 'Kolom username wajib diisi',
                'username.regex' => 'Username hanya boleh terdiri dari huruf, angka, atau karakter _.',
                'username.unique' => 'Username sudah digunakan oleh pengguna lain.',
                'hak-akses.required' => 'Kolom hak-akses wajib diisi',
                'password.required' => 'Kolom password wajib diisi',
                'password.min' => 'Password harus memiliki setidaknya :min karakter.',
                'password.confirmed' => 'Konfirmasi password tidak cocok.',
                'password_confirmation.required' => 'Kolom Konfirmasi password wajib diisi',
            ]
        );


        $hash_password = Hash::make($data['password'], ['rounds' => 12]);


        $user = User::create([
            'name' => $data['nama'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => $hash_password,
            'created_at' => now(),
            'updated_at' => now()

        ]);

        $role = Role::where('name', $data['hak-akses'])->get();

        $user->assignRole([$role]);

        $pesan = 'Data berhasil ditambahkan';
        $title = 'Berhasil';
        $icon = 'success';

        return redirect()->route('data-user')->with('status', compact('pesan', 'title', 'icon'));
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

        $user = User::with('roles')->where('id', $id)->first();

        foreach ($user->roles as $role) {
            $rl = $role['name'];
        }

        $data = Role::whereNot('name', 'admin-utama')->whereNot('name', $rl)->orderBy('id', 'asc')->get();

        return view('main-layouts.master-data.edit-pengguna', compact(['user', 'data']));
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

        $user = User::find($id);


        // $role = Role::find($request->akses);

        $role = User::with('roles')->where('id', $id)->first();

        foreach ($role->roles as $rl) {
            $dt = $rl['name'];
        }
        // $user->update($request->all());

        $rules = [
            'name' => 'required|max:255',
            // 'akses' => 'required',
        ];

        if ($request->email != $user->email) {
            $rules['email'] = 'required|email|unique:users';
        }

        if ($request->username != $user->username) {
            $rules['username'] = 'required|regex:/^[a-zA-Z0-9_]+$/|unique:users,username';
        }

        $customMessage = [
            'name.required' => 'Kolom nama wajib diisi',
            'name.max' => 'Kolom nama tidak boleh lebih dari :max karakter.',

            'email.required' => 'Kolom email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan oleh pengguna lain.',

            'username.required' => 'Kolom username wajib diisi',
            'username.regex' => 'Username hanya boleh terdiri dari huruf, angka, atau karakter _.',
            'username.unique' => 'Username sudah digunakan oleh pengguna lain.',
        ];

        $validatedData = $request->validate($rules, $customMessage);
        User::where('id', $user->id)->update($validatedData);

        if ($request->akses != $dt) {
            $user->syncRoles($request->akses);
        }

        $userSesudah = User::find($id);

        $roleSesudah = User::with('roles')->where('id', $id)->first();

        foreach ($roleSesudah->roles as $rl) {
            $dk = $rl['name'];
        }

        $adaPerubahan = $user->getOriginal('name') !== $userSesudah->name
            || $user->getOriginal('username') !== $userSesudah->username
            || $user->getOriginal('email') !== $userSesudah->email
            || $dt !== $dk;

        if ($adaPerubahan) {
            $pesan = 'Data berhasil diubah';
            $title = 'Berhasil';
            $icon = 'success';
            return redirect()->route('data-user')->with('status', compact('pesan', 'title', 'icon'));
        } else {
            return redirect()->route('data-user');
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
        $user = User::find($id);

        $masuk = SuratMasuk::where('user_id', $user->id)->get();
        $keluar = SuratKeluar::where('user_id', $user->id)->get();

        foreach ($masuk as $i) {
            $nama = $i['file_surat'];
            if (file_exists("assets/dokumen/surat-masuk/" . $nama)) {
                unlink("assets/dokumen/surat-masuk/" . $nama);
            }
        }

        foreach ($keluar as $i) {
            $nama = $i['file_surat'];
            if (file_exists("assets/dokumen/surat-keluar/" . $nama)) {
                unlink("assets/dokumen/surat-keluar/" . $nama);
            }
        }

        $user->delete();

        $pesan = 'Data berhasil dihapus';
        $title = 'Berhasil';
        $icon = 'success';

        return back()->with('status', compact('pesan', 'title', 'icon'));
    }

    public function profil($id)
    {
        $user = User::where('id', $id)->first();
        return view('main-layouts.master-data.profil', compact('user'));
    }

    public function profil_edit(Request $request, $id)
    {
        $user = User::find($id);


        $rules = [
            'name' => 'required|max:255',
            // 'akses' => 'required',
        ];

        if ($request->email != $user->email) {
            $rules['email'] = 'required|email|unique:users';
        }

        if ($request->username != $user->username) {
            $rules['username'] = 'required|regex:/^[a-zA-Z0-9_]+$/|unique:users,username';
        }

        $customMessage = [
            'name.required' => 'Kolom nama wajib diisi',
            'name.max' => 'Kolom nama tidak boleh lebih dari :max karakter.',

            'email.required' => 'Kolom email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan oleh pengguna lain.',

            'username.required' => 'Kolom username wajib diisi',
            'username.regex' => 'Username hanya boleh terdiri dari huruf, angka, atau karakter _.',
            'username.unique' => 'Username sudah digunakan oleh pengguna lain.',
        ];

        $validatedData = $request->validate($rules, $customMessage);
        User::where('id', $user->id)->update($validatedData);


        $userSesudah = User::find($id);


        $adaPerubahan = $user->getOriginal('name') !== $userSesudah->name
            || $user->getOriginal('username') !== $userSesudah->username
            || $user->getOriginal('email') !== $userSesudah->email;

        if ($adaPerubahan) {
            $pesan = 'Data berhasil diubah';
            $title = 'Berhasil';
            $icon = 'success';
            return back()->with('status', compact('pesan', 'title', 'icon'));
        } else {
            return back();
        }
    }

    public function ubah_password(Request $request, $id)
    {
        $data = $request->validate(
            [
                'current_password' => 'required',
                'password' => 'required|min:8|confirmed',
                'password_confirmation' => 'required|'
            ],
            [
                'current_password.required' => 'Kolom password wajib diisi',
                'password.required' => 'Kolom password wajib diisi',
                'password.min' => 'Password harus memiliki setidaknya :min karakter.',
                'password.confirmed' => 'Password tidak cocok.',
                'password_confirmation.required' => 'Kolom Konfirmasi password wajib diisi',
            ]
        );

        $user = User::where('id', $id)->first();

        // Memeriksa apakah password saat ini cocok
        if (Hash::check($request->current_password, $user->password)) {
            // Mengganti password
            $user->update(['password' => bcrypt($data['password'])]);
            $pesan = 'Password berhasil diubah silahkan login kembali';
            $title = 'Berhasil';
            $icon = 'success';

            Auth::logout();
            return redirect()->route('login.view')->with('status', compact('pesan', 'title', 'icon'));
        } else {
            $pesan = 'Password anda tidak valid';
            $title = 'Gagal';
            $icon = 'error';
            return back()->with('status', compact('pesan', 'title', 'icon'));
        }
    }
}
