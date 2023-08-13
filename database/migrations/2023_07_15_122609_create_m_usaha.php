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
        Schema::create('m_usaha', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('code_mb')->nullable();
            $table->string('kd_usaha')->nullable();
            $table->string('nama')->nullable();
            $table->string('npwp')->nullable();
            $table->integer('tahun')->nullable();
            $table->string('alamat')->nullable();
            $table->string('sektor')->nullable();
            $table->string('produk')->nullable();
            $table->string('kap_produksi')->nullable();
            $table->string('ssr_usaha')->nullable();
            $table->integer('jml_modal')->nullable();
            $table->string('asal_modal')->nullable();
            $table->integer('jml_aset')->nullable();
            $table->integer('jml_omzet')->nullable();
            $table->integer('laba_bersih')->nullable();
            $table->integer('jml_pekerja')->nullable();
            $table->string('riwayat')->nullable();
            $table->integer('rencana')->nullable();
            $table->string('alasan')->nullable();
            $table->string('kebutuhan')->nullable();
            $table->string('penggunaan')->nullable();
            $table->integer('kesanggupan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_usaha');
    }
};
