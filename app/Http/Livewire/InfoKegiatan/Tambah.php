<?php

namespace App\Http\Livewire\InfoKegiatan;

use Livewire\Component;

class Tambah extends Component
{
    public function render()
    {
        $data['title'] = 'Tambah Informasi Kegiatan';
        return view('livewire.info-kegiatan.tambah', $data);
    }
}
