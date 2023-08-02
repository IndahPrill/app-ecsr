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
            $table->string('kd_usaha')->nullable();
            $table->string('nama')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('alamat')->nullable();
            $table->string('hubungan')->nullable();
            $table->enum('hubungan', ['1','2','3','4','5','6','7'])->default('1')->comment('1=suami; 2=isteri; 3=anak; 4=menantu; 5=orag tua; 6=mertua; 7=cucu');
            $table->string('no_tlp')->nullable();
            $table->string('no_ktp')->nullable();
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
