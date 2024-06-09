<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('judul_buku');
            $table->integer('jumlah_buku');
            $table->string('pengarang_buku')->nullable(); 
            $table->string('penerbit_buku')->nullable(); 
            $table->integer('halaman_buku')->nullable();
            $table->text('deskripsi_buku')->nullable();
            $table->string('gambar_buku');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
