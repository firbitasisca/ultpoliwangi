<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login_page()
    {
        
        return view('pages.authentication.auth-login');
    }

    public function doLogin(Request $request)
    {
        // Validasi
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);
      
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Mengambil user yang berhasil masuk
            $user = Auth::user();

            // Memeriksa apakah user memiliki entri di tabel Admin
            if ($user->admin) {
                // Menampilkan alert toast setelah autentikasi berhasil
                Alert::toast('Selamat datang admin', 'success');

                return redirect()->route('admin.dashboard.page');
            } else {
                Auth::logout(); // Logout user yang tidak memiliki entri Admin
                return back()->withErrors([
                    'name' => 'Anda tidak terdaftar sebagai Admin',
                ])->onlyInput('name');
            }
        }

        // Menampilkan pesan error jika kredential yang dimasukkan salah
        return back()->withErrors([
            'name' => 'Username and password invalid.',
        ])->onlyInput('name');
    }

    public function doLogout(Request $request)
    {
        Session::flush();

        Auth::logout();

        Alert::toast('Anda baru saja logout', 'info');

        return redirect()->route('login.page');
    }
}
