<?php

namespace App\Http\Livewire\MitraBinaan;

use Livewire\Component;

class Daftar extends Component
{

    public function render()
    {
        $data['title'] = 'Daftar Mitra Binaan';
        return view('livewire.mitra-binaan.daftar', $data);
    }
}
