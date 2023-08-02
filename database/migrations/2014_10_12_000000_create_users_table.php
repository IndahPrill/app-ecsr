<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('code_mb')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('address')->nullable();
            $table->string('no_tlp')->nullable();
            $table->string('no_ktp')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('genre', ['0','1','2'])->default('0')->comment('1=Laki-laki;2=Perempuan');
            $table->enum('user_level', ['0','1','2'])->default('0')->comment('0=User;1=Admin;2=Staf');
            $table->enum('status_login', ['0','1','2'])->default('0')->comment('1=Login;2=Logout');
            $table->enum('user_valid', ['0','1','2'])->default('0')->comment('1=Valid;2=TidakValid');
            $table->rememberToken()->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
