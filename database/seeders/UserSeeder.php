<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            [
                'code_mb' => null,
                'first_name' => 'User',
                'last_name' => 'Admin',
                'email' => 'admin@gmail.com',
                'no_ktp' => '7471090000000001',
                'genre' => '2',
                'user_level' => '1',
                'status_login' => '0',
                'user_valid' => '1',
                'password' => '$2y$10$6Yy3pC9KVKMN/oOK/LcUveB2BVjtUT63Xl2yFOkEp6xZU3LSC8Fki', // 123456
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code_mb' => null,
                'first_name' => 'User',
                'last_name' => 'Staf',
                'email' => 'staf@gmail.com',
                'no_ktp' => '7471100000000001',
                'genre' => '1',
                'user_level' => '2',
                'status_login' => '0',
                'user_valid' => '1',
                'password' => '$2y$10$6Yy3pC9KVKMN/oOK/LcUveB2BVjtUT63Xl2yFOkEp6xZU3LSC8Fki', // 123456
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code_mb' => 'BM23042300001',
                'first_name' => 'User',
                'last_name' => 'User',
                'email' => 'user@gmail.com',
                'no_ktp' => '7471110000000001',
                'genre' => '1',
                'user_level' => '0',
                'status_login' => '0',
                'user_valid' => '1',
                'password' => '$2y$10$6Yy3pC9KVKMN/oOK/LcUveB2BVjtUT63Xl2yFOkEp6xZU3LSC8Fki', // 123456
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
