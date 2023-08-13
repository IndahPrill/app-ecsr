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
        DB::table("data_survey")->insert(
            [
                [
                    "nama" => "KOPERASI KARYAWAN RANCABOLANG",
                    "alamat" => "PERKEBUNAN RANCABOLANG",
                    "wilayah" => "Bandung",
                    "tahun" => "2021",
                    "angsuran" => "19",
                    "status_klasifikasi" => "macet",
                    "jenis_usaha" => "perdagangan",
                    "status_usaha" => "Tidak Aktif"
                ],
                [
                    "nama" => "RENI PRIHANDINI",
                    "alamat" => "BANDUNG",
                    "wilayah" => "Bandung",
                    "tahun" => "2021",
                    "angsuran" => "19",
                    "status_klasifikasi" => "macet",
                    "jenis_usaha" => "perdagangan",
                    "status_usaha" => "Tidak Aktif"
                ],
                [
                    "nama" => "SUBRAN KHOLID",
                    "alamat" => "JALAN RAYA CILEUNYI NO.32 BANDUNG",
                    "wilayah" => "Bandung",
                    "tahun" => "2021",
                    "angsuran" => "19",
                    "status_klasifikasi" => "macet",
                    "jenis_usaha" => "perdagangan",
                    "status_usaha" => "Tidak Aktif"
                ],
                [
                    "nama" => "YAYAT HIDAYAT B",
                    "alamat" => "JLN.PARAKANSAAT NO.17 RT06/06 KEC ARCAMANIK ENDAH",
                    "wilayah" => "Bandung",
                    "tahun" => "2021",
                    "angsuran" => "22",
                    "status_klasifikasi" => "diragukan",
                    "jenis_usaha" => "perdagangan",
                    "status_usaha" => "Tidak Aktif"
                ],
                [
                    "nama" => "ASEP TASLAM NULKARIMAH",
                    "alamat" => "JL SINDANG SIRNA BANDUNG",
                    "wilayah" => "Bandung",
                    "tahun" => "2021",
                    "angsuran" => "22",
                    "status_klasifikasi" => "diragukan",
                    "jenis_usaha" => "perdagangan",
                    "status_usaha" => "Tidak Aktif"
                ],
                [
                    "nama" => "SITI MAHMUDAH",
                    "alamat" => "JLN.MENGERGIRANG RT11 RW08 KEL.PASIRLUYU KEC.REGOL",
                    "wilayah" => "Bandung",
                    "tahun" => "2021",
                    "angsuran" => "25",
                    "status_klasifikasi" => "kurang lancar",
                    "jenis_usaha" => "perdagangan",
                    "status_usaha" => "Aktif"
                ],
                [
                    "nama" => "BEN IBRAHIM ABISUDJAK",
                    "alamat" => "JL.ANTARIKSA NO 12 BANDUNG",
                    "wilayah" => "Bandung",
                    "tahun" => "2021",
                    "angsuran" => "25",
                    "status_klasifikasi" => "kurang lancar",
                    "jenis_usaha" => "perdagangan",
                    "status_usaha" => "Aktif"
                ],
                [
                    "nama" => "EUIS YULIANA",
                    "alamat" => "KOPM. GBA 2 BLOK G5 RT10/09 CIPAGALO BJ SOANG BDG.",
                    "wilayah" => "Bandung",
                    "tahun" => "2022",
                    "angsuran" => "13",
                    "status_klasifikasi" => "kurang lancar",
                    "jenis_usaha" => "industri",
                    "status_usaha" => "Aktif"
                ],
                [
                    "nama" => "HENI HINDIYANA B",
                    "alamat" => "JL.SAMPORA NO.282 DS.SUKAMENAK MARGAHAYU,BANDUNG",
                    "wilayah" => "Bandung",
                    "tahun" => "2022",
                    "angsuran" => "13",
                    "status_klasifikasi" => "kurang lancar",
                    "jenis_usaha" => "perkebunan",
                    "status_usaha" => "Aktif"
                ],
                [
                    "nama" => "MUKTI MUHARAM B",
                    "alamat" => "JL.SETRA INDAH BARAT 6 3/3 KEL.SUKAGIH, SUKAJADI",
                    "wilayah" => "Bandung",
                    "tahun" => "2022",
                    "angsuran" => "19",
                    "status_klasifikasi" => "macet",
                    "jenis_usaha" => "perkebunan",
                    "status_usaha" => "Aktif"
                ],
                [
                    "nama" => "SITI HALIDA B",
                    "alamat" => "KOMP.GBA 2 BLOK G5 N0.23 KOTA BANDUNG",
                    "wilayah" => "Bandung",
                    "tahun" => "2022",
                    "angsuran" => "19",
                    "status_klasifikasi" => "macet",
                    "jenis_usaha" => "perkebunan",
                    "status_usaha" => "Aktif"
                ],
                [
                    "nama" => "HENI H",
                    "alamat" => "Jl. Cipaera No. 94/33 RT 01 RW 03 Kel. Malabar Kec. Lengkong Kota Bandung 40262",
                    "wilayah" => "Bandung",
                    "tahun" => "2022",
                    "angsuran" => "19",
                    "status_klasifikasi" => "lancar",
                    "jenis_usaha" => "jasa",
                    "status_usaha" => "Aktif"
                ],
                [
                    "nama" => "ABDURRAHMAN WIDYA ANANTA",
                    "alamat" => "HAURWANGIN RAJAMANDALA KAB.CIANJUR",
                    "wilayah" => "Bandung Selatan",
                    "tahun" => "2022",
                    "angsuran" => "19",
                    "status_klasifikasi" => "lancar",
                    "jenis_usaha" => "jasa",
                    "status_usaha" => "Aktif"
                ],
                [
                    "nama" => "RATNA KOMALA",
                    "alamat" => "PERKEBUNAN PURBASARI PANGALENGAN",
                    "wilayah" => "Bandung Selatan",
                    "tahun" => "2022",
                    "angsuran" => "19",
                    "status_klasifikasi" => "lancar",
                    "jenis_usaha" => "jasa",
                    "status_usaha" => "Aktif"
                ],
                [
                    "nama" => "SURATMI",
                    "alamat" => "KMP.BARUSULAM RT.92/RW.04 DESA SUKAMANAH",
                    "wilayah" => "Bandung Selatan",
                    "tahun" => "2022",
                    "angsuran" => "13",
                    "status_klasifikasi" => "kurang lancar",
                    "jenis_usaha" => "jasa",
                    "status_usaha" => "Aktif"
                ],
                [
                    "nama" => "DEDE SUPRIATNA",
                    "alamat" => "PERKEBUNAN PURBASARI PANGALENGAN",
                    "wilayah" => "Bandung Selatan",
                    "tahun" => "2022",
                    "angsuran" => "13",
                    "status_klasifikasi" => "kurang lancar",
                    "jenis_usaha" => "jasa",
                    "status_usaha" => "Aktif"
                ],
                [
                    "nama" => "WAHYU",
                    "alamat" => "PERKEBUNAN PURBASARI PANGALENGAN",
                    "wilayah" => "Bandung Selatan",
                    "tahun" => "2022",
                    "angsuran" => "13",
                    "status_klasifikasi" => "kurang lancar",
                    "jenis_usaha" => "jasa",
                    "status_usaha" => "Aktif"
                ],
                [
                    "nama" => "WINDIYANTI",
                    "alamat" => "PERKEBUNAN PURBASARI",
                    "wilayah" => "Bandung Selatan",
                    "tahun" => "2022",
                    "angsuran" => "10",
                    "status_klasifikasi" => "diragukan",
                    "jenis_usaha" => "pertanian",
                    "status_usaha" => "Aktif"
                ],
                [
                    "nama" => "JAJANG SUHENDAR",
                    "alamat" => "PERKEBUNAN PURBASARI",
                    "wilayah" => "Bandung Selatan",
                    "tahun" => "2022",
                    "angsuran" => "10",
                    "status_klasifikasi" => "diragukan",
                    "jenis_usaha" => "pertanian",
                    "status_usaha" => "Aktif"
                ],
                [
                    "nama" => "WIWI WINARSIH",
                    "alamat" => "PERKEBUNAN PURBASARI",
                    "wilayah" => "Bandung Selatan",
                    "tahun" => "2022",
                    "angsuran" => "10",
                    "status_klasifikasi" => "diragukan",
                    "jenis_usaha" => "pertanian",
                    "status_usaha" => "Tidak Aktif"
                ],
                [
                    "nama" => "DHIYA ULAYYA TSABITAH",
                    "alamat" => "PERKEBUNAN PURBASARI",
                    "wilayah" => "Bandung Selatan",
                    "tahun" => "2022",
                    "angsuran" => "10",
                    "status_klasifikasi" => "diragukan",
                    "jenis_usaha" => "pertanian",
                    "status_usaha" => "Tidak Aktif"
                ],
                [
                    "nama" => "MITRA KOLABORASI BRI",
                    "alamat" => "PERKEBUNAN PURBASARI",
                    "wilayah" => "Bandung Selatan",
                    "tahun" => "2021",
                    "angsuran" => "31",
                    "status_klasifikasi" => "lancar",
                    "jenis_usaha" => "pertanian",
                    "status_usaha" => "Aktif"
                ],
                [
                    "nama" => "KELOMPOK H.MANSYUR",
                    "alamat" => "PERKEBUNAN PURBASARI",
                    "wilayah" => "Bandung Selatan",
                    "tahun" => "2021",
                    "angsuran" => "31",
                    "status_klasifikasi" => "lancar",
                    "jenis_usaha" => "pertanian",
                    "status_usaha" => "Tidak Aktif"
                ],
                [
                    "nama" => "SULMID",
                    "alamat" => "PERKEBUNAN PURBASARI",
                    "wilayah" => "Bandung Selatan",
                    "tahun" => "2021",
                    "angsuran" => "31",
                    "status_klasifikasi" => "lancar",
                    "jenis_usaha" => "pertanian",
                    "status_usaha" => "Tidak Aktif"
                ],
                [
                    "nama" => "ASEP SOLEH",
                    "alamat" => "PERKEBUNAN PURBASARI",
                    "wilayah" => "Bandung Selatan",
                    "tahun" => "2021",
                    "angsuran" => "31",
                    "status_klasifikasi" => "lancar",
                    "jenis_usaha" => "perkebunan",
                    "status_usaha" => "Tidak Aktif"
                ],
                [
                    "nama" => "SRIYANI",
                    "alamat" => "Kp.Haurwangi RT.002 RW.005 Rajamandala",
                    "wilayah" => "Bandung Barat",
                    "tahun" => "2021",
                    "angsuran" => "19",
                    "status_klasifikasi" => "macet",
                    "jenis_usaha" => "perkebunan",
                    "status_usaha" => "Tidak Aktif"
                ],
                [
                    "nama" => "NINING SUNINGSIH",
                    "alamat" => "KP BARUKAI PANYANDAAN",
                    "wilayah" => "Bandung Barat",
                    "tahun" => "2021",
                    "angsuran" => "19",
                    "status_klasifikasi" => "macet",
                    "jenis_usaha" => "perikanan",
                    "status_usaha" => "Tidak Aktif"
                ],
                [
                    "nama" => "AI ROKHAETI",
                    "alamat" => "PERKEBUNAN JALUPANG",
                    "wilayah" => "Subang",
                    "tahun" => "2021",
                    "angsuran" => "19",
                    "status_klasifikasi" => "macet",
                    "jenis_usaha" => "perikanan",
                    "status_usaha" => "Tidak Aktif"
                ],
                [
                    "nama" => "MUMUH",
                    "alamat" => "MITRA KEBUN  TAMBAK SARI",
                    "wilayah" => "Subang",
                    "tahun" => "2021",
                    "angsuran" => "22",
                    "status_klasifikasi" => "diragukan",
                    "jenis_usaha" => "perikanan",
                    "status_usaha" => "Tidak Aktif"
                ],
                [
                    "nama" => "SURYATI",
                    "alamat" => "MITRA KEBUN  TAMBAK SARI",
                    "wilayah" => "Subang",
                    "tahun" => "2021",
                    "angsuran" => "22",
                    "status_klasifikasi" => "diragukan",
                    "jenis_usaha" => "industri",
                    "status_usaha" => "Tidak Aktif"
                ],
                [
                    "nama" => "E.AMINAH",
                    "alamat" => "MITRA KEBUN  TAMBAK SARI",
                    "wilayah" => "Subang",
                    "tahun" => "2021",
                    "angsuran" => "22",
                    "status_klasifikasi" => "diragukan",
                    "jenis_usaha" => "industri",
                    "status_usaha" => "Tidak Aktif"
                ],
                [
                    "nama" => "SUNARSIH",
                    "alamat" => "MITRA KEBUN  TAMBAK SARI",
                    "wilayah" => "Subang",
                    "tahun" => "2021",
                    "angsuran" => "25",
                    "status_klasifikasi" => "kurang lancar",
                    "jenis_usaha" => "industri",
                    "status_usaha" => "Tidak Aktif"
                ],
                [
                    "nama" => "SOLEH",
                    "alamat" => "DESA KASOMALANG KEC JLN CAGAK",
                    "wilayah" => "Subang",
                    "tahun" => "2022",
                    "angsuran" => "13",
                    "status_klasifikasi" => "kurang lancar",
                    "jenis_usaha" => "industri",
                    "status_usaha" => "Tidak Aktif"
                ],
                [
                    "nama" => "YATI",
                    "alamat" => "DESA KASOMALANG KEC JLN CAGAK",
                    "wilayah" => "Subang",
                    "tahun" => "2022",
                    "angsuran" => "13",
                    "status_klasifikasi" => "kurang lancar",
                    "jenis_usaha" => "industri",
                    "status_usaha" => "Aktif"
                ],
                [
                    "nama" => "WATMI",
                    "alamat" => "MITRA KEBUN  CIATER",
                    "wilayah" => "Subang",
                    "tahun" => "2022",
                    "angsuran" => "19",
                    "status_klasifikasi" => "lancar",
                    "jenis_usaha" => "jasa",
                    "status_usaha" => "Aktif"
                ],
                [
                    "nama" => "LUKMAN",
                    "alamat" => "MITRA KEBUN  CIATER",
                    "wilayah" => "Subang",
                    "tahun" => "2022",
                    "angsuran" => "19",
                    "status_klasifikasi" => "lancar",
                    "jenis_usaha" => "jasa",
                    "status_usaha" => "Aktif"
                ],
                [
                    "nama" => "ATIN",
                    "alamat" => "MITRA KEBUN  CIATER",
                    "wilayah" => "Subang",
                    "tahun" => "2022",
                    "angsuran" => "10",
                    "status_klasifikasi" => "diragukan",
                    "jenis_usaha" => "jasa",
                    "status_usaha" => "Tidak Aktif"
                ],
                [
                    "nama" => "A.HARIS",
                    "alamat" => "PERKEBUNAN CIATER",
                    "wilayah" => "Subang",
                    "tahun" => "2022",
                    "angsuran" => "10",
                    "status_klasifikasi" => "diragukan",
                    "jenis_usaha" => "jasa",
                    "status_usaha" => "Tidak Aktif"
                ],
                [
                    "nama" => "WIWI",
                    "alamat" => "DESA CIPANCAR KECAMATAN SAGALAHERANG",
                    "wilayah" => "Subang",
                    "tahun" => "2022",
                    "angsuran" => "19",
                    "status_klasifikasi" => "lancar",
                    "jenis_usaha" => "peternakan",
                    "status_usaha" => "Aktif"
                ],
                [
                    "nama" => "ETI SUHARTINI",
                    "alamat" => "DESA CIPANCAR III SAGALA HERANG",
                    "wilayah" => "Subang",
                    "tahun" => "2022",
                    "angsuran" => "19",
                    "status_klasifikasi" => "lancar",
                    "jenis_usaha" => "peternakan",
                    "status_usaha" => "Aktif"
                ],
                [
                    "nama" => "TANTI ROSLIANTI",
                    "alamat" => "KMP.SAKALI DESA CIKUJANG SAGALAHERANG",
                    "wilayah" => "Subang",
                    "tahun" => "2022",
                    "angsuran" => "13",
                    "status_klasifikasi" => "kurang lancar",
                    "jenis_usaha" => "peternakan",
                    "status_usaha" => "Tidak Aktif"
                ],
                [
                    "nama" => "L.ASWAT",
                    "alamat" => "PERKEBUNAN CIATER SUBANG",
                    "wilayah" => "Subang",
                    "tahun" => "2022",
                    "angsuran" => "13",
                    "status_klasifikasi" => "kurang lancar",
                    "jenis_usaha" => "peternakan",
                    "status_usaha" => "Tidak Aktif"
                ],
                [
                    "nama" => "L.ARFAN",
                    "alamat" => "KP.PASIRLANGU,KEC. CISARUA, KAB.BANDUNG BARAT",
                    "wilayah" => "Bandung Barat",
                    "tahun" => "2022",
                    "angsuran" => "10",
                    "status_klasifikasi" => "diragukan",
                    "jenis_usaha" => "perikanan",
                    "status_usaha" => "Tidak Aktif"
                ],
                [
                    "nama" => "L.SUMARNA",
                    "alamat" => "KP.PASANGGRAHAN,DS.SINARJAYA,KEC.GUNUNGHALU,KBB",
                    "wilayah" => "Bandung Barat",
                    "tahun" => "2022",
                    "angsuran" => "10",
                    "status_klasifikasi" => "diragukan",
                    "jenis_usaha" => "perikanan",
                    "status_usaha" => "Tidak Aktif"
                ],
                [
                    "nama" => "CHOIRUDDIN",
                    "alamat" => "KP.BARU (TANGSI) DS.GN.HALU KEC.GN.HALU KAB.BARBAR",
                    "wilayah" => "Bandung Barat",
                    "tahun" => "2022",
                    "angsuran" => "10",
                    "status_klasifikasi" => "diragukan",
                    "jenis_usaha" => "perikanan",
                    "status_usaha" => "Aktif"
                ],
                [
                    "nama" => "ADI TJAHYONO",
                    "alamat" => "KP.CIPOEK DS.SIRNAJAYA KEC. GUNUNG HALU KAB.BARBAR",
                    "wilayah" => "Bandung Barat",
                    "tahun" => "2022",
                    "angsuran" => "10",
                    "status_klasifikasi" => "diragukan",
                    "jenis_usaha" => "perikanan",
                    "status_usaha" => "Aktif"
                ],
                [
                    "nama" => "EKO SURYO",
                    "alamat" => "PASIRLANGU RT.04/03 CISARUA, KAB.BANDUNG BARAT",
                    "wilayah" => "Bandung Barat",
                    "tahun" => "2021",
                    "angsuran" => "31",
                    "status_klasifikasi" => "lancar",
                    "jenis_usaha" => "perdagangan",
                    "status_usaha" => "Aktif"
                ],
                [
                    "nama" => "SULAEMAN",
                    "alamat" => "PARISLANGU RT.03/03 CISARUA, KAB.BANDUNG BARAT",
                    "wilayah" => "Bandung Barat",
                    "tahun" => "2021",
                    "angsuran" => "31",
                    "status_klasifikasi" => "lancar",
                    "jenis_usaha" => "perdagangan",
                    "status_usaha" => "Aktif"
                ],
                [
                    "nama" => "RIANTI RESA",
                    "alamat" => "KARYAWANGI RT02/07,PARONGPONG KAB.BANDUNG BARAT",
                    "wilayah" => "Bandung Barat",
                    "tahun" => "2021",
                    "angsuran" => "31",
                    "status_klasifikasi" => "lancar",
                    "jenis_usaha" => "perdagangan",
                    "status_usaha" => "Aktif"
                ],
                [
                    "nama" => "ANNISA RILANI",
                    "alamat" => "PERKEBUNAN JALUPANG SUBANG",
                    "wilayah" => "Subang",
                    "tahun" => "2021",
                    "angsuran" => "31",
                    "status_klasifikasi" => "lancar",
                    "jenis_usaha" => "perdagangan",
                    "status_usaha" => "Aktif"
                ]
            ]
        );
    }
}
