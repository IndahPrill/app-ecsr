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
        Schema::create('m_informasi', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kegiatan')->unique();
            $table->string('nama_kegiatan');
            $table->date('tgl_kegiatan');
            $table->string('kategori_usaha');
            $table->string('produk_usaha');
            $table->longText('deskripsi_usaha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_informasi');
    }
};
