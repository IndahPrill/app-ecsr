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
        Schema::create('mining_c45', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('atribut');
            $table->string('nilai_atribut');
            $table->string('jml_kasus_total');
            $table->string('jml_aktif');
            $table->string('jml_tdk_aktif');
            $table->string('entropy');
            $table->string('inf_gain');
            $table->string('inf_gain_temp');
            $table->string('split_info');
            $table->string('split_info_temp');
            $table->string('gain_ratio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('mining_c45');
    }
};
