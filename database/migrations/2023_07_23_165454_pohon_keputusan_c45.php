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
        Schema::create('pohon_keputusan_c45', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('atribut')->nullable();
            $table->string('nilai_atribut')->nullable();
            $table->string('id_parent')->nullable();
            $table->string('jml_aktif')->nullable();
            $table->string('jml_tdk_aktif')->nullable();
            $table->string('keputusan')->nullable();
            $table->string('diproses')->nullable();
            $table->string('kondisi_atribut')->nullable();
            $table->string('looping_kondisi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('pohon_keputusan_c45');
    }
};
