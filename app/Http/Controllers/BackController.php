<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BackController extends Controller
{
    protected $redirectTo = '/';
    public function index()
    {
        if (Auth::check()) {
            return redirect($this->redirectTo);
        }
        return view('auth.loginView');
    }

    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong'
        ]);

        $cari_user = User::where('username', $credentials['username'])->first();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $users = session(['data_login' => $cari_user]);

            // return redirect()->intended('/');

            return redirect()->route('home');
        }

        $pesan = 'Username atau Password salah';
        $title = 'Gagal';
        $icon = 'error';
        return back()->with('status', compact('pesan', 'title', 'icon'));
    }

    public function proses_login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $cari_user = User::where('username', $username)->first();

        if ($cari_user == null) {
            return redirect()->route('login')->with('gagal', 'Username atau password salah')->withInput();
        }

        $passwordMatch = Hash::check($password, $cari_user->password);

        if ($passwordMatch) {
            $users = session(['data_login' => $cari_user]);
            return redirect()->route('home')->with('status', 'Berhasil Login!');
        } else {
            return redirect()->route('login')->with('gagal', 'Username atau password salah');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login.view');
    }

    // public function logout(Request $request)
    // {
    //     $users = session('data_login');
    //     $request->session()->forget('data_login');
    //     $request->session()->flush();
    //     $request->session()->invalidate();

    //     return redirect()->route('login')->with('status', 'Anda telah logout!');
    // }
}
