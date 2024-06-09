<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorebukuRequest;
use App\Http\Requests\UpdatebukuRequest;
use App\Models\buku;
use Illuminate\Http\Request;

class PerpustakaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home.konten.bukus', [
            
            'bukus' => buku::paginate(30),
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
    public function store(StorebukuRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(buku $perpustakaan)
    {

        
        // $tes = buku::find($perpustakaan);
        // dd($tes);

        $id = $perpustakaan->id;
        
        return view('home.konten.lihat',[

            'lihat_buku' => buku::find($id)

        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatebukuRequest $request, buku $buku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(buku $buku)
    {
        //
    }
}
