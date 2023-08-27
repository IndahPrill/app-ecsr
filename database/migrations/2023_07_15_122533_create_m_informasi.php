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
            $table->enum('kategori_usaha', ['0','1','2','3','4','5','6'])->default('0')->comment('0=industri; 1=perdagangan; 2=pertanian; 3=Pertanian; 4=Perkebunan; 5=Peternakan; 6=Jasa');
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
