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
        Schema::create('m_mitra_binaan', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('code_mb')->nullable();
            $table->string('nama')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('kebangsaan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kabupaten_kota')->nullable();
            $table->string('no_tlp')->nullable();
            $table->string('no_ktp')->nullable();
            $table->string('jabatan')->nullable();
            $table->bigInteger('va')->nullable();
            $table->enum('status', ['0','1','2'])->default('0')->comment('0=pengajuan; 1=setuju/reviews; 2=tolak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_mitra_binaan');
    }
};
