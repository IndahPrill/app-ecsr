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
            $table->string('code_mb')->unique();
            $table->string('kd_usaha')->unique();
            $table->string('nama');
            $table->string('npwp')->unique();
            $table->string('tahun');
            $table->string('alamat');
            $table->string('sektor');
            $table->string('produk');
            $table->string('kap_produksi');
            $table->string('ssr_usaha');
            $table->string('jml_modal');
            $table->string('asal_modal');
            $table->string('jml_aset');
            $table->string('jml_omzet');
            $table->string('laba_bersih');
            $table->string('jml_pekerja');
            $table->string('riwayat');
            $table->string('rencana');
            $table->string('alasan');
            $table->string('kebutuhan');
            $table->string('penggunaan');
            $table->string('kesanggupan');
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
