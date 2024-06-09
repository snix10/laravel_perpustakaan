<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class buku extends Model
{

    public $table = "bukus";

    use HasFactory;
    protected $fillable = [
        'judul_buku',
        'jumlah_buku',
        'pengarang_buku',
        'penerbit_buku',
        'halaman_buku',
        'deskripsi_buku',
        'gambar_buku',  
        'slug',  
    
    ];

    

    public function kategoris()
    {
        return $this->belongsToMany(kategori::class,'kategori_bukus');
    }

    public function pinjams()
    {
        return $this->hasMany(pinjam::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
