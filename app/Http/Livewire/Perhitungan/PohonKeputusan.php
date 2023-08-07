<?php

namespace App\Http\Livewire\Perhitungan;

use Livewire\Component;

class PohonKeputusan extends Component
{
    public function render()
    {
        $data['title'] = 'Pohon Keputusan C45';
        return view('livewire.perhitungan.pohon-keputusan', $data);
    }
}
