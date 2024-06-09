<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\buku;
use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = auth()->user()->id;
        
        if ($id === 1 ) {
            $title = 'Delete Data!';
            $text = "Are you sure you want to delete?";
            confirmDelete($title, $text);

        return view('admin.bukus.table', [

            'bukus' => buku::paginate(50),
            'nama_halaman' => 'Tabel Buku',
            
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
        
        

        $id = auth()->user()->id;
        if ($id === 1) {
            return view('admin.bukus.create', [

                'kategoris' => kategori::all(),
                'nama_halaman' => 'Tambah Buku',
    
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

        

        //membuat slug
        $judul = $request->judul_buku;
        $slug = Str::slug($judul); //judul-buku
        $slugs = $slug . '-' . Str::upper(Str::random(10)); //judul-buku-XLSKAMND2
        
        
        $this->validate($request, [
            'judul_buku'    => 'required|max:250',
            'jumlah_buku'    => 'required|',
            'gambar_buku' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);
         

         
         if ($request->hasfile('gambar_buku')) {    //kondisi , apakah ada data atau file
    		$file = $request->file('gambar_buku');   // memasukan/menampung data pada variabel $file
    		$extension = $file->getClientOriginalExtension();  // menampung extensi / format gambar/file (png,jpg,dll)
    		$filename = time() . '.' . $extension;  // mengganti nama file/gambar dengan angka berdasarkan waktu (1234567.jpg)
    		$file->move('GambarBuku', $filename);   // menyimpan data kedalam folder public/
            
    	} else {

    		$filename = "";  // jika tidak ada/else ,  maka variabel penampung kosong
    	}

         

        buku::create([
            
            
            'judul_buku'   => $request->judul_buku,
            'jumlah_buku'   => $request->jumlah_buku,
            'jenis_buku'   => $request->jenis_buku,
            'pengarang_buku'   => $request->pengarang_buku,
            'penerbit_buku'   => $request->penerbit_buku,
            'halaman_buku'   => $request->halaman_buku,
            'deskripsi_buku'   => $request->deskripsi_buku,
            'gambar_buku'   => $filename,   //variabel yang sudah dikondisikan
            'slug' => $slugs,
        ]);
        
        $buku = buku::latest()->first(); //mengambil data tarakhir

        $kategori = $request->kategori;  //mengambil data kategori berupa array
 
        $buku->kategoris()->sync($kategori); //memasukan data kedalam tabel pivot //many yo many

        // Alert::success('Hore!', 'Post Created Successfully');

        toast('Your Post as been submited!','success');
        
        return redirect('/buku');
    }

    /**
     * Display the specified resource.
     */
    public function show(buku $buku)
    {

        $id = auth()->user()->id;
        if ($id === 1) {
            $title = 'Delete Data!';
            $text = "Are you sure you want to delete?";
            confirmDelete($title, $text);
    
            $id = $buku->id;
            return view('admin.bukus.lihat',[
    
                'lihat_buku' => buku::find($id),
                'nama_halaman' => 'Tabel Buku',
                
    
            ]);
        } else {
            return redirect()->back();
        }

        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(buku $buku)
    {
        $id = $buku->id;
        return view('admin.bukus.edit', [

            'nama_halaman' => 'Edit Buku',
            'edit_buku' => buku::find($id),
            'kategoris' => kategori::all(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, buku $buku)
    {

        $request_judul_buku = $request->judul_buku;

        $db_judul_buku = $buku->judul_buku;

        //jika judul sama atau tidak di ubah maka slug tidak di ubah 
        //tetapi jika judul tidak sama atau diubah maka slug juga diubah 

        if ($request_judul_buku == $db_judul_buku) {
            $slugs = $buku->slug;
            
        } else {

            $slug = Str::slug($request_judul_buku); //judul-buku
            $slugs = $slug . '-' . Str::upper(Str::random(10)); // judul-buku-MXJSL4JK
        }
        


        $buku = buku::find($buku->id);



        if ($request->hasfile('gambar_buku')) {    //kondisi , apakah ada data atau file baru
        $file = public_path('GambarBuku/'.$buku->gambar_buku); //menampung data dan folder gambar/file yang sudah ada
        if (file_exists($file)) {   //cek data
            @unlink($file);         // hapus data
        }

        
    		$file = $request->file('gambar_buku');   // memasukan/menampung data pada variabel $file yang baru
    		$extension = $file->getClientOriginalExtension();  // menampung extensi / format gambar/file (png,jpg,dll)
    		$filename = time() . '.' . $extension;  // mengganti nama file/gambar dengan angka berdasarkan waktu (1234567.jpg)
    		$file->move('GambarBuku', $filename);   // menyimpan data kedalam folder public/


            $buku->update([
            
                'judul_buku'   => $request->judul_buku,
                'jumlah_buku'   => $request->jumlah_buku,
                'jenis_buku'   => $request->jenis_buku,
                'pengarang_buku'   => $request->pengarang_buku,
                'penerbit_buku'   => $request->penerbit_buku,
                'halaman_buku'   => $request->halaman_buku,
                'deskripsi_buku'   => $request->deskripsi_buku,
                'gambar_buku'   => $filename,   //variabel yang sudah dikondisikan
                'slug'  => $slugs,
    
            ]);
            
    	} else {

            $buku->update([
                
                'judul_buku'   => $request->judul_buku,
                'jumlah_buku'   => $request->jumlah_buku,
                'jenis_buku'   => $request->jenis_buku,
                'pengarang_buku'   => $request->pengarang_buku,
                'penerbit_buku'   => $request->penerbit_buku,
                'halaman_buku'   => $request->halaman_buku,
                'deskripsi_buku'   => $request->deskripsi_buku,
                'slug'  => $slugs,
            ]);
    

        }

        
        $kategori = $request->kategori;  //mengambil data kategori berupa array

        $buku->kategoris()->sync($kategori);

        // alert()->success('Okee!','Buku berhasil di Edit');
        toast('Data Berhasil diEdit !','success');

        return redirect('/buku');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(buku $buku)
    {

        $id = auth()->user()->id;
        if ($id === 1) {
            $buku = buku::find($buku->id);

            $buku->kategoris()->detach();  //hapus data ditabel pivot

            $file = public_path('GambarBuku/'.$buku->gambar_buku); //menampung data dan folder gambar/file buku
            if (file_exists($file)) {   //cek data
                @unlink($file);         // hapus data
            }else {
                
            }

            $buku->delete();   //hapus data didatabase

            toast('Data Berhasil Dihapus !','success');

            return redirect('/buku');
        } else {
            return redirect()->back();
        }

        
    
    }
}
