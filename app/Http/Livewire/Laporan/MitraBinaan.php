<?php

namespace App\Http\Livewire\Laporan;

use Livewire\Component;

class MitraBinaan extends Component
{

    public function render()
    {
        $data['title'] = 'Laporan Mitra Binaan';
        return view('livewire.laporan.mitra-binaan', $data);
    }
}
