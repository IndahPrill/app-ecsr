<?php

namespace App\Http\Livewire\InfoKegiatan;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\m_informasi as informasi;

class Tambah extends Component
{
    /**
     * define variable
     *
     * @var string
     *
     */
    public $nama_kegiatan, $tgl_kegiatan, $ktgr_usaha, $produk_usaha, $desk_kegiatan;


    public function render()
    {
        $data['title'] = 'Tambah Informasi Kegiatan';
        return view('livewire.info-kegiatan.tambah', $data);
    }

    /**
     * Reseting all inputted fields
     * @return void
     */
    public function resetFields()
    {
        $this->nama_kegiatan = '';
        $this->tgl_kegiatan = '';
        $this->ktgr_usaha = '';
        $this->produk_usaha = '';
        $this->desk_kegiatan = '';
    }

    /**
     * store the user inputted post data in the posts table
     * @return void
     */
    public function store()
    {
        $validatedData = $this->validate([
            'nama_kegiatan' => 'required',
            'tgl_kegiatan'  => 'required|date',
            'ktgr_usaha'    => 'required',
            'produk_usaha'  => 'required',
            'desk_kegiatan' => 'required',
        ]);

        try {
            $qry = DB::select(DB::raw("SELECT SUBSTR(kode_kegiatan, 4, 3) kode
                                FROM m_informasi
                                WHERE kode_kegiatan LIKE 'KKG%'
                                ORDER BY SUBSTR(kode_kegiatan, 4, 3) DESC LIMIT 1"));
                                
            $urutan = (int)$qry[0]->kode + 1;
            $urutan++;

            $kode = "KKG" . sprintf("%03s", $urutan); // KKG001;

            $informasi = informasi::Create([
                'kode_kegiatan' => $kode,
                'nama_kegiatan' => $this->nama_kegiatan,
                'tgl_kegiatan' => $this->tgl_kegiatan,
                'kategori_usaha' => $this->ktgr_usaha,
                'produk_usaha' => $this->produk_usaha,
                'deskripsi_usaha' => $this->desk_kegiatan,
            ]);

            session()->flash('success','Created Successfully!!');
            $this->resetFields();
        } catch (\Exception $e) {
            // Set Flash Message
            session()->flash('error','Something goes wrong!! '.$e->getMessage());
        }
    }

}
