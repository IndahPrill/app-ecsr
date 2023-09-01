<?php

namespace App\Http\Livewire\Pengajuan;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\m_mitra_binaan as MrMitraBinaan;
use App\Models\m_usaha as MUsaha;
use App\Models\m_ahli_waris as MAhliWaris;
use App\Models\User;

class Tambah extends Component
{
    /**
     * define variable
     *
     * @var string
     *
     */
    public $code_mb, $dp_nama_pemilik, $dp_tempat_lahir, $dp_tgl_lahir, $dp_kebangsaan, $dp_alamat, $dp_kabupaten_kota, $dp_no_tlp, $dp_no_ktp, $dp_jabatan;
    public $du_nama_usaha, $du_npwp, $du_tahun_usaha, $du_alamat_usaha, $du_sektor_usaha, $du_produk_usaha;
    public $du_kapasitas_produksi, $du_sarana_usaha, $du_jml_modal_usaha, $du_asal_modal_usaha, $du_jml_aset_usaha;
    public $du_jml_omset_bulan, $du_laba_bersih, $du_jml_tenaga_kerja, $du_riwayat_usaha, $du_rencana_usaha;
    public $du_alasan_peminjaman, $du_kebutuhan_modal, $du_penggunaan_modal, $du_kesanggupan_angsuran;
    public $aw_nama, $aw_tempat_lahir, $aw_tgl_lahir, $aw_alamat, $aw_hubungan, $aw_no_tlp, $aw_no_ktp;
    public $currentStep = 1;

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function render()
    {
        $data['title'] = 'Form Pengajuan';
        return view('livewire.pengajuan.tambah', $data);
    }

    /**
     * Reseting all inputted fields
     * @return void
     */
    public function resetFields()
    {
        $this->dp_nama_pemilik = '';
        $this->dp_tempat_lahir = '';
        $this->dp_tgl_lahir = '';
        $this->dp_kebangsaan = '';
        $this->dp_alamat = '';
        $this->dp_kabupaten_kota = '';
        $this->dp_no_tlp = '';
        $this->dp_no_ktp = '';
        $this->dp_jabatan = '';
        $this->du_nama_usaha = '';
        $this->du_npwp = '';
        $this->du_tahun_usaha = '';
        $this->du_alamat_usaha = '';
        $this->du_sektor_usaha = '';
        $this->du_produk_usaha = '';
        $this->du_kapasitas_produksi = '';
        $this->du_sarana_usaha = '';
        $this->du_jml_modal_usaha = '';
        $this->du_asal_modal_usaha = '';
        $this->du_jml_aset_usaha = '';
        $this->du_jml_omset_bulan = '';
        $this->du_laba_bersih = '';
        $this->du_jml_tenaga_kerja = '';
        $this->du_riwayat_usaha = '';
        $this->du_rencana_usaha = '';
        $this->du_alasan_peminjaman = '';
        $this->du_kebutuhan_modal = '';
        $this->du_penggunaan_modal = '';
        $this->du_kesanggupan_angsuran = '';
        $this->aw_nama = '';
        $this->aw_tempat_lahir = '';
        $this->aw_tgl_lahir = '';
        $this->aw_alamat = '';
        $this->aw_hubungan = '';
        $this->aw_no_tlp = '';
        $this->aw_no_ktp = '';
    }

    /**
     * Validasi kolom data pribadi
     *
     * @return response()
     */
    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'dp_nama_pemilik' => 'required',
            'dp_tempat_lahir' => 'required',
            'dp_tgl_lahir' => 'required|date',
            'dp_kebangsaan' => 'required',
            'dp_alamat' => 'required',
            'dp_kabupaten_kota' => 'required',
            'dp_no_tlp' => 'required|numeric',
            'dp_no_ktp' => 'required|numeric',
            'dp_jabatan' => 'required',
        ]);

        $this->currentStep = 2;
    }

    /**
     * validasi kolom data usaha
     *
     * @return response()
     */
    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'du_nama_usaha' => 'required',
            'du_npwp' => 'required|numeric',
            'du_tahun_usaha' => 'required|numeric',
            'du_alamat_usaha' => 'required',
            'du_sektor_usaha' => 'required',
            'du_produk_usaha' => 'required',
            'du_kapasitas_produksi' => 'required',
            'du_sarana_usaha' => 'required',
            'du_jml_modal_usaha' => 'required|numeric',
            'du_asal_modal_usaha' => 'required',
            'du_jml_aset_usaha' => 'required|numeric',
            'du_jml_omset_bulan' => 'required|numeric',
            'du_laba_bersih' => 'required|numeric',
            'du_jml_tenaga_kerja' => 'required|numeric',
            'du_riwayat_usaha' => 'required',
            'du_rencana_usaha' => 'required',
            'du_alasan_peminjaman' => 'required',
            'du_kebutuhan_modal' => 'required',
            'du_penggunaan_modal' => 'required',
            'du_kesanggupan_angsuran' => 'required|numeric',
        ]);

        $this->currentStep = 3;
    }

    /**
     * store the user inputted post data in the posts table
     * @return void
     */
    public function store()
    {
        $validatedData = $this->validate([
            'aw_nama' => 'required',
            'aw_tempat_lahir' => 'required',
            'aw_tgl_lahir' => 'required|date',
            'aw_alamat' => 'required',
            'aw_hubungan' => 'required',
            'aw_no_tlp' => 'required|numeric',
            'aw_no_ktp' => 'required|numeric',
        ]);

        try {

            $qry = User::selectRaw('MAX(SUBSTR(code_mb, 10, 5)) AS kode, SUBSTR(code_mb, 4, 2) AS day, SUBSTR(code_mb, 6, 2) AS month, SUBSTR(code_mb, 8, 2) as year')
                    // ->whereRaw('SUBSTR(code_mb, 4, 2) = if( DAY(CURDATE()) < 10, CONCAT(\'0\',DAY(CURDATE())),DAY(CURDATE())) AND SUBSTR(code_mb, 6, 2) = if( MONTH(CURDATE()) < 10, CONCAT(\'0\',MONTH(CURDATE())),MONTH(CURDATE())) AND SUBSTR(code_mb, 8, 2) = SUBSTR(YEAR(CURDATE()), 3,2)')
                    ->where('code_mb', '!=' ,'null')
                    ->whereRaw('SUBSTR( code_mb, 7, 2 ) = SUBSTR(YEAR(CURDATE()), 3, 2)')
                    ->groupBy('id')
                    ->first();

            $urutan = (int) $qry->kode + 1;
            $urutan++;

            $kode = "MB";
            $day = date("d");
            $month = date("m");
            $year = substr(date("Y"), 2, 2);

            if ($this->code_mb == "") {
                $kd_mb = $kode . $day . $month . $year . sprintf("%05s", $urutan); // MB04042023000001
            } else {
                $kd_mb = $this->code_mb;
            }

            $m_mitra_binaan = MrMitraBinaan::Create([
                'code_mb' => $kd_mb,
                'nama' => $this->dp_nama_pemilik,
                'tempat_lahir' => $this->dp_tempat_lahir,
                'tgl_lahir' => $this->dp_tgl_lahir,
                'kebangsaan' => $this->dp_kebangsaan,
                'alamat' => $this->dp_alamat,
                'kabupaten_kota' => $this->dp_kabupaten_kota,
                'no_tlp' => $this->dp_no_tlp,
                'no_ktp' => $this->dp_no_ktp,
                'jabatan' => $this->dp_jabatan,
                'status' => '0',
            ]);

            $m_usaha = MUsaha::Create([
                'code_mb' => $kd_mb,
                'kd_usaha' => 'DU'.Str::random(10),
                'nama' => $this->du_nama_usaha,
                'npwp' => $this->du_npwp,
                'tahun' => $this->du_tahun_usaha,
                'alamat' => $this->du_alamat_usaha,
                'sektor' => $this->du_sektor_usaha,
                'produk' => $this->du_produk_usaha,
                'kap_produksi' => $this->du_kapasitas_produksi,
                'ssr_usaha' =>$this->du_sarana_usaha,
                'jml_modal' => $this->du_jml_modal_usaha,
                'asal_modal' => $this->du_asal_modal_usaha,
                'jml_aset' => $this->du_jml_aset_usaha,
                'jml_omzet' => $this->du_jml_omset_bulan,
                'laba_bersih' => $this->du_laba_bersih,
                'jml_pekerja' => $this->du_jml_tenaga_kerja,
                'riwayat' => $this->du_riwayat_usaha,
                'rencana' => $this->du_rencana_usaha,
                'alasan' => $this->du_alasan_peminjaman,
                'kebutuhan' => $this->du_kebutuhan_modal,
                'penggunaan' => $this->du_penggunaan_modal,
                'kesanggupan' => $this->du_kesanggupan_angsuran
            ]);

            $m_ahli_warsi = MAhliWaris::Create([
                'kd_usaha' => $m_usaha->kd_usaha,
                'nama' => $this->aw_nama,
                'tempat_lahir' => $this->aw_tempat_lahir,
                'tgl_lahir' => $this->aw_tgl_lahir,
                'alamat' => $this->aw_alamat,
                'hubungan' => $this->aw_hubungan,
                'no_tlp' => $this->aw_no_tlp,
                'no_ktp' => $this->aw_no_ktp
            ]);

            session()->flash('success','Created Successfully!!');
            $this->resetFields();
            $this->currentStep = 1;
        } catch (\Exception $e) {
            // Set Flash Message
            session()->flash('error','Something goes wrong!! '.$e->getMessage());
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function back($step)
    {
        $this->currentStep = $step;
    }
}
