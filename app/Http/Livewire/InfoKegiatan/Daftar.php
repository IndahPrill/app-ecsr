<?php

namespace App\Http\Livewire\InfoKegiatan;

use Livewire\Component;

class Daftar extends Component
{

    public function render()
    {
        $data['title'] = 'Daftar Informasi Kegiatan';
        return view('livewire.info-kegiatan.daftar', $data);
    }
}
