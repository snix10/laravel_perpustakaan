<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function lamandaftar()
    {
        return view('auth.Daftar');
    }

    public function daftar(Request $request)
    {
        
        $validatedData = $request->validate([
            'name'    => 'required|min:3|max:255',
            'email'   => 'required|email|unique:users',
            'password'=> 'required|min:5|max:255'
         ]);

           $validatedData['password'] = bcrypt($validatedData['password']);


         User::create($validatedData);

         return redirect('/masuk')->with('berhasil','Registrasi berhasil - silahkan login!');
    }

    public function lamanmasuk()
    {
        return view('auth.Masuk');
    }
    public function masuk(request $request)
    {

        $credentials = $request->validate([
            'email'    =>   'required|email',
            'password' =>   'required'
        ]);

        if(Auth::attempt($credentials)) {

            $id = auth()->user()->id;
            
            $request->session()->regenerate();

            if ($id === 1) {
                return redirect()->intended('/dashboard')->with('loginberhasil','selamat datang di web ini');
            } else {
                return redirect()->intended('/perpustakaan')->with('loginberhasil','selamat datang di web ini');
            }
            
           
        }

        return back()->with('masukGagal','Gagal Masuk');
    }

    public function keluar()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('masuk');
    }

}
