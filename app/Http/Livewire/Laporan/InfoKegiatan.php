<?php

namespace App\Http\Livewire\Laporan;

use Livewire\Component;

class InfoKegiatan extends Component
{

    public function render()
    {
        $data['title'] = 'Laporan Informasi Kegiatan';
        return view('livewire.laporan.info-kegiatan', $data);
    }
}
