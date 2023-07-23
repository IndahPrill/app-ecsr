<?php

namespace App\Http\Livewire\Laporan;

use Livewire\Component;

class Pengajuan extends Component
{
    public function render()
    {
        $data['title'] = 'Laporan Pengajuan';
        return view('livewire.laporan.pengajuan', $data);
    }
}
