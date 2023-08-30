<?php

namespace App\Http\Livewire\Laporan;

use Livewire\Component;
use App\Models\m_informasi as informasi;

class InfoKegiatan extends Component
{

    public function render()
    {
        $data['title'] = 'Laporan Informasi Kegiatan';
        $data['data'] = informasi::orderBy('kode_kegiatan', 'desc')->get();
        return view('livewire.laporan.info-kegiatan', $data);
    }
}
