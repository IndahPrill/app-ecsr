<?php

namespace App\Http\Livewire\Pengajuan;

use Livewire\Component;
use Livewire\WithPagination;

class Daftar extends Component
{
    use WithPagination;

    public function render()
    {
        $data['title'] = 'Daftar Pengajuan';
        return view('livewire.pengajuan.daftar', $data);
    }
}
