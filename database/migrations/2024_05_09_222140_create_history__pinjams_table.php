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
        Schema::create('history_pinjams', function (Blueprint $table) {

            $table->integer('user_id');
            $table->integer('buku_id');
            $table->integer('jumlah_buku');
            $table->date('tgl_pinjam');
            $table->date('tgl_konfirmasi')->nullable();
            $table->date('tgl_kembali');
            $table->integer('limit_pinjam');
            $table->string('status')->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_pinjams');
    }
};
