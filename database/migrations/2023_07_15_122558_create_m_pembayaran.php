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
        Schema::create('m_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->string('code_mb')->unique();
            $table->date('tgl_bayar');
            $table->date('tgl_jth_tmpo');
            $table->bigInteger('jumlah');
            $table->integer('kesanggupan');
            $table->integer('rencana');
            $table->integer('angsuran');
            $table->integer('angsuran_berjalan');
            $table->integer('tunggakan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_pembayaran');
    }
};
