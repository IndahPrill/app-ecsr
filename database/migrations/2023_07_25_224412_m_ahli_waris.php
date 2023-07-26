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
        Schema::create('m_ahli_waris', function (Blueprint $table) {
            $table->id('id')->unique();
            $table->string('kd_usaha');
            $table->string('nama');
            $table->string('ttl');
            $table->string('alamat');
            $table->string('hubungan');
            $table->string('no_tlp');
            $table->string('no_ktp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('m_ahli_waris');
    }
};
