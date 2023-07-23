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
        Schema::create('d_mitra_binaan', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('kd_mb')->unique();
            $table->string('kode_pembayaran')->unique();
            $table->string('kd_usaha')->unique();
            $table->bigInteger('sisa_tagihan');
            $table->bigInteger('total_tagihan');
            $table->dateTime('kontrak_start', $precision = 0);
            $table->dateTime('kontrak_end', $precision = 0);
            $table->string('kategori');
            $table->enum('status', ['0','1','2','3','4'])->default('0')->comment('1=lancar; 2=kurang lancar; 3=diragukan; 4=mcaet');
            $table->longText('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_mitra_binaan');
    }
};
