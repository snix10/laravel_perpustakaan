<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\kategori;

use Illuminate\Http\Request;

class SearchController extends Controller
{
   public function search(Request $request)
   {


      $search = $request->input('search');
      $bukus = buku::where('judul_buku', 'like', "%$search%")->get();
      $kategoris = kategori::where('nama', 'like', "%$search%")->get();

      if ($search === null) {

         return redirect('/perpustakaan');

      } else {
         return view('home.konten.search', [

            'kategoris' => $kategoris,
            'bukus' => $bukus,
            'nama_halaman' => 'Tabel Buku',
          ]);
      }

   } 
}
