<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('data_survey', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('nama')->nullable();
            $table->string('alamat')->nullable();
            $table->string('wilayah')->nullable();
            $table->string('tahun')->nullable();
            $table->string('angsuran')->nullable();
            $table->string('status_klasifikasi')->nullable();
            $table->string('jenis_usaha')->nullable();
            $table->string('status_usaha')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('data_survey');
    }
};
