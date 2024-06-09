<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama'
        
    ];

    public function bukus()
    {
        return $this->belongsToMany(buku::class,'kategori_bukus');
    }

    public function getRouteKeyName()
    {
        return 'nama';
    }
}
