<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History_Pinjam extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'buku_id',
        'tgl_pinjam',
        'tgl_konfirmasi',
        'tgl_kembali',
        'limit_pinjam',
        'status',
        'jumlah_buku',
        
    ];

}
