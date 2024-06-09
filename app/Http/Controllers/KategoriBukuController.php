<?php

namespace App\Http\Controllers;

use App\Models\kategori;

use Illuminate\Http\Request;

class KategoriBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        

        $id = auth()->user()->id;
        if ($id === 1) {
            $title = 'Delete Kategori!';
            $text = "Are you sure you want to delete?";
            confirmDelete($title, $text);

            return view('admin.kategori_bukus.kategori_buku', [

                'kategoribukus' => kategori::paginate(20),
                'nama_halaman' => 'Kategori Buku',
            ]);
        } else {
            return redirect()->back();
        }

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // $id = auth()->user()->id;
        // if ($id === 1) {
        //     # code...
        // } else {
        //     return redirect()->back();
        // }

        $id = auth()->user()->id;
        if ($id === 1) {
            return view('admin.kategori_bukus.create', [

            
                'nama_halaman' => 'Tambah Kategori',
    
            ]);
        } else {
            return redirect()->back();
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $id = auth()->user()->id;
        if ($id === 1) {
            $this->validate($request, [
                'nama'    => 'required',
             ]);
    
            kategori::create([
                
                'nama'   => $request->nama,
            ]);
    
            toast('Data Berhasil DiTambahkan !','success');
            
            return redirect('/kategori');
        } else {
            return redirect()->back();
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(kategori $kategori)
    {
        $id = auth()->user()->id;
        if ($id === 1) {
            $id = $kategori->id;
        
        return view('admin.kategori_bukus.lihat',[

            'kategoris' => kategori::find($id),
            'nama_halaman' => 'Kategori',
            

        ]);
        } else {
            return redirect()->back();
        }
        
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kategori $kategori)
    {

        $id = auth()->user()->id;
        if ($id === 1) {
            $id = $kategori->id;
        return view('admin.kategori_bukus.edit', [

            'nama_halaman' => 'Edit Kategori',
            'edit_kategori' => kategori::find($id),
            
        ]);
        } else {
            return redirect()->back();
        }
        
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kategori $kategori)
    {
        $kategori = kategori::find($kategori->id);
        $kategori->update([
                
            'nama'   => $request->nama,
        ]);

        toast('Data Berhasil DiEdit !','success');

        return redirect('/kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kategori $kategori)
    {

        $id = auth()->user()->id;
        if ($id === 1) {
            $kategori = kategori::find($kategori->id);

            $kategori->bukus()->detach();  //hapus data ditabel pivot

            $kategori->delete();   //hapus data didatabase

            toast('Data Berhasil DiHapus !','success');

            return redirect('/kategori');
        } else {
            return redirect()->back();
        }
        
        
    }
}
