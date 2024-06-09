<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pinjam extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'buku_id',
        'judul_buku',
        'gambar_buku',
        'tgl_pinjam',
        'tgl_konfirmasi',
        'tgl_kembali',
        'limit_pinjam',
        'status',
        'jumlah_buku',
        
    ];

    public function buku()
    {
        return $this->belongsTo(buku::class);
    }

}
