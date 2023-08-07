<?php

namespace App\Http\Livewire\Perhitungan;

use Livewire\Component;

class Hasil extends Component
{
    public function render()
    {
        $data['title'] = 'Hasil Perhitungan C45';
        return view('livewire.perhitungan.hasil', $data);
    }
}
