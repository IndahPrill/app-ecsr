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
            $table->string('kode_pembayaran')->unique();
            $table->string('nama');
            $table->string('usaha');
            $table->bigInteger('va');
            $table->dateTime('tgl_pembayaran', $precision = 0);
            $table->bigInteger('jumlah');
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
