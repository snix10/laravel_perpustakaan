<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    public function index()
    {
        return view('auth.Daftar');
    }

    public function store(Request $request)
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

    
}
