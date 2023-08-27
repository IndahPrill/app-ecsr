<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class data_surveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("m_informasi")->insert([
            [
                [
                    "id" => "",
                    "kode_kegiatan" => "",
                    "nama_kegiatan" => "hut kementrian BUMN",
                    "tgl_kegiatan" => "2023-02-05",
                    "kategori_usaha"=> "Perdagangan",
                    "produk_usaha" => "makanan, fashion, jasa",
                    "deskripsi_usaha" => "membawa sampel produk dan mengirimkan deskripsikan produknya masing-masing",
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    "id" => "",
                    "kode_kegiatan" => "",
                    "nama_kegiatan" => "kegiatan bazar umkm TJSL",
                    "tgl_kegiatan" => "2023-03-04",
                    "kategori_usaha" => "Perdagangan",
                    "produk_usaha" => "makanan, fashion, jasa",
                    "deskripsi_usaha": "membawa sampel produk dan mengirimkan deskripsikan produknya masing-masing",
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    "id" => "",
                    "kode_kegiatan" => "",
                    "nama_kegiatan" => "safari ramadhan TJSL BUMN",
                    "tgl_kegiatan" => "2023-04-07",
                    "kategori_usaha" => "Perdagangan",
                    "produk_usaha" => "makanan, fashion, jasa",
                    "deskripsi_usaha" => "membawa sampel produk dan mengirimkan deskripsikan produknya masing-masing",
                    "created_at" => now(),
                    "updated_at" => now() 
                ],
                [
                    "id"=> "",
                    "kode_kegiatan" => "",
                    "nama_kegiatan" => "kegiatan UMKM TJSL BUMN",
                    "tgl_kegiatan" => "2023-05-08",
                    "kategori_usaha" => "Perdagangan",
                    "produk_usaha" => "makanan, fashion, jasa",
                    "deskripsi_usaha" => "membawa sampel produk dan mengirimkan deskripsikan produknya masing-masing",
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    "id" => "",
                    "kode_kegiatan" => "",
                    "nama_kegiatan" => "safety riding",
                    "tgl_kegiatan" => "2023-05-12",
                    "kategori_usaha" => "industri",
                    "produk_usaha" => "helm ",
                    "deskripsi_usaha" => "membawa sampel produk dan mengirimkan deskripsikan produknya masing-masing",
                    "created_at" => now(),
                    "updated_at" => now()
                ]
            ]
        ]);
    }
}