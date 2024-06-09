<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MasukController extends Controller
{
    
    public function index()
    {
        return view('auth.Masuk');
    }
    public function Masuk(request $request)
    {

        $credentials = $request->validate([
            'email'    =>   'required|email',
            'password' =>   'required'
        ]);

        if(Auth::attempt($credentials)) {

            $request->session()->regenerate();
            return redirect()->intended('/perpustakaan')->with('loginberhasil','selamat datang di web ini');
        }

        return back()->with('masukGagal','Gagal Masuk');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('masuk');
    }
}
