<?php

namespace App\Http\Livewire\Pengajuan;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\m_mitra_binaan as MrMitraBinaan;
use App\Models\d_mitra_binaan as DtlMitraBinaan;
use App\Models\m_usaha as MUsaha;

class Tambah extends Component
{
    /**
     * define variable
     *
     * @var string
     *
    */
    public $dp_nama_pemilik, $dp_ttl, $dp_kebangsaan, $dp_alamat, $dp_no_tlp, $dp_no_ktp, $dp_jabatan;
    public $du_nama_usaha, $du_npwp, $du_tahun_usaha, $du_alamat_usaha, $du_sektir_usaha, $du_produk_usaha;
    public $du_kapasitas_produksi, $du_sarana_usaha, $du_jml_modal_usaha, $du_asal_modal_usaha, $du_jml_aset_usaha;
    public $du_jml_omset_bulan, $du_laba_bersih, $du_jml_tenaga_kerja, $du_riwayat_usaha, $du_rencana_usaha;
    public $du_alasan_peminjaman, $du_kebutuhan_modal, $du_penggunaan_modal, $du_kesanggupan_angsuran;
    public $aw_nama, $aw_ttl, $aw_alamat, $aw_hubungan, $aw_no_tlp, $aw_no_ktp;

    // Validation Rules
    protected $rules = [
        'dp_nama_pemilik'=>'required',
        'dp_ttl'=>'required',
        'dp_kebangsaan'=>'required',
        'dp_alamat'=>'required',
        'dp_no_tlp'=>'required',
        'dp_no_ktp'=>'required',
        'dp_jabatan'=>'required',
        'du_nama_usaha'=>'required',
        'du_npwp'=>'required',
        'du_tahun_usaha'=>'required',
        'du_alamat_usaha'=>'required',
        'du_sektir_usaha'=>'required',
        'du_produk_usaha'=>'required',
        'du_kapasitas_produksi'=>'required',
        'du_sarana_usaha'=>'required',
        'du_jml_modal_usaha'=>'required',
        'du_asal_modal_usaha'=>'required',
        'du_jml_aset_usaha'=>'required',
        'du_jml_omset_bulan'=>'required',
        'du_laba_bersih'=>'required',
        'du_jml_tenaga_kerja'=>'required',
        'du_riwayat_usaha'=>'required',
        'du_rencana_usaha'=>'required',
        'du_alasan_peminjaman'=>'required',
        'du_kebutuhan_modal'=>'required',
        'du_penggunaan_modal'=>'required',
        'du_kesanggupan_angsuran'=>'required',
        'aw_nama'=>'required',
        'aw_ttl'=>'required',
        'aw_alamat'=>'required',
        'aw_hubungan'=>'required',
        'aw_no_tlp'=>'required',
        'aw_no_ktp'=>'required',
    ];

    /**
     * Reseting all inputted fields
     * @return void
     */
    public function resetFields()
    {
        $this->dp_nama_pemilik = '';
        $this->dp_ttl = '';
        $this->dp_kebangsaan = '';
        $this->dp_alamat = '';
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
        $this->aw_ttl = '';
        $this->aw_alamat = '';
        $this->aw_hubungan = '';
        $this->aw_no_tlp = '';
        $this->aw_no_ktp = '';
    }

    public function store()
    {
        // Validate Form Request
        $this->validate();

        try {
            MrMitraBinaan::Create([
                'kd_mb' => $kd_mb,
                'nama' => $this->dp_nama_pemilik,
                'ttl' => $this->dp_ttl,
                'kebangsaan' => $this->dp_kebangsaan,
                'alamat' => $this->dp_alamat,
                'no_tlp' => $this->dp_no_tlp,
                'no_ktp' => $this->dp_no_ktp,
                'jabatan' => $this->dp_jabatan,
            ]);

            MUsaha::Create([
                'kd_usaha' => 'DU'.Str::random(5),
                'nama' => $this->du_nama_usaha,
                'npwp' => $this->du_npwp,
                'tahun' => $this->du_tahun_usaha,
                'alamat' => $this->du_alamat_usaha,
                'sektor' => $this->du_sektor_usaha,
                'produk' => $this->du_produk_usaha,
                'kapasitas_produksi' => $this->du_kapasitas_produksi,
                'sasaran_usaha' =>$this->du_sarana_usaha,
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
                'kesanggupan' => $this->du_kesanggupan_angsuran,
                'aw_nama' => $this->aw_nama,
                'aw_ttl' => $this->aw_ttl,
                'aw_alamat' => $this->aw_alamat,
                'aw_hubungan' => $this->aw_hubungan,
                'aw_no_tlp' => $this->aw_no_tlp,
                'aw_no_ktp' => $this->aw_no_ktp
            ]);

            session()->flash('success','Created Successfully!!');
            $this->resetFields();
        } catch (\Exception $e) {
            // Set Flash Message
            session()->flash('error','Something goes wrong!!');
        }
    }

    public function render()
    {
        $data['title'] = 'Tambah Pengajuan';
        return view('livewire.pengajuan.tambah', $data);
    }
}
