<?php

namespace App\Http\Livewire\MitraBinaan;

use Livewire\Component;

class Tambah extends Component
{
    public function render()
    {
        $data['title'] = 'Tambah Mintra Binaan';
        return view('livewire.mitra-binaan.tambah', $data);
    }
}
