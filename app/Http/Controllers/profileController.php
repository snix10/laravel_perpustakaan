<?php

namespace App\Http\Controllers;

use App\Models\pinjam;
use App\Models\buku;
use Illuminate\Http\Request;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $auth = auth()->user()->id;
        
        $data = pinjam::where('user_id',$auth)->get();
        
        
        // $date = pinjam::where('user_id',$auth)->get();
        // $coba = $date->tgl_kembali;
        // $date4 = strtotime($coba);
        // dd($date4);

        return view('home.users.lamanUser', [

            'pinjams' => pinjam::where('user_id',$auth)->get(),
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
