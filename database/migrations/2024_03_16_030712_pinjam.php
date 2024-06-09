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
        Schema::create('pinjams', function (Blueprint $table) {
            
            $table->id();
            $table->integer('user_id');
            $table->unsignedBigInteger('buku_id');
            $table->integer('jumlah_buku');
            $table->date('tgl_pinjam');
            $table->date('tgl_konfirmasi')->nullable();
            $table->date('tgl_kembali');
            $table->integer('limit_pinjam');
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('buku_id')->references('id')->on('bukus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjams');
    }
};
