<?php

namespace App\Http\Controllers;

use App\Models\pinjam;
use App\Models\buku;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Alert;

class PinjamBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth = auth()->user()->id;
        
        return view('home.users.lamanUser', [

            'pinjams' => pinjam::paginate(50),
            
            
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
    public function store(Request $request, buku $buku)
    {
       
        $date = time();
        $date2 = Carbon::now()->getTimestamp();
        
        $buku_id = $request->id;
        $slug = $request->slug;

        $user_id = auth()->user()->id;

        $pinjam = pinjam::where('user_id', $user_id)->get();

        //cek buku apakah sudah dipinjam atau belum 

        if (pinjam::where('buku_id', $buku_id )->where('user_id',$user_id)->exists()) {
            Alert::warning('', 'Buku ini sudah dipinjam');
            return redirect()->back();
        }


        $db_buku = buku::find($buku_id);
        $db_slug = buku::find($slug);

        // dd($db_buku);
        

        $this->validate($request, [
           
            'id'   => 'required|exists:bukus',
            'slug'   => 'required|exists:bukus',
            'judul_buku'   => 'required|exists:bukus',
            'gambar_buku'   => 'required|exists:bukus',
            'judul_buku'   => 'required|exists:bukus',
            'jumlah'   => 'required|max:3|integer',
            'hari'     => 'required|max:7|integer',
            
           
         ]);

        //  dd('berhasil validasi');
         
         $pinjam = $request->hari;
         $tgl_pinjam = Carbon::now()->toDateString();
         $tgl_kembali = Carbon::now()->addDay($pinjam)->toDateString();
         $auth = auth()->user()->id;
        //  dd($tgl_pinjam);


        pinjam::create([
            
            'user_id'   => auth()->user()->id,
            'buku_id'   => $request->id,
            'jumlah_buku'   => $request->jumlah,
            'tgl_pinjam'   => $tgl_pinjam,
            'tgl_konfirmasi'   => $tgl_pinjam,
            'tgl_kembali'   => $tgl_kembali,
            'limit_pinjam'   => '1',
            'status'   => 'menunggu',
            
        ]);

        toast('Berhasil Meminjam','success');

        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     */
    public function show(pinjam $pinjam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pinjam $pinjam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pinjam $pinjam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pinjam $pinjam)
    {
        //
    }
}
