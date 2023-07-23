<?php

namespace App\Http\Livewire\MitraBinaan;

use Livewire\Component;

class Pembayaran extends Component
{

    public function render()
    {
        $data['title'] = 'Pembayaran Mitra Binaan';
        return view('livewire.mitra-binaan.pembayaran', $data);
    }
}
