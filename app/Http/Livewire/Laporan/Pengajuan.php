<?php

namespace App\Http\Livewire\Laporan;

use Livewire\Component;
use App\Models\m_mitra_binaan as MrMitraBinaan;

class Pengajuan extends Component
{
    public function render()
    {
        $data['title'] = 'Laporan Pengajuan';
        $data['data']  = MrMitraBinaan::select('code_mb', 'nama', 'tempat_lahir', 'tgl_lahir', 'kebangsaan', 'alamat', 'kabupaten_kota', 'no_tlp', 'no_ktp', 'jabatan', 'va', 'status')
                            ->orderBy('code_mb', 'desc')
                            ->get();
        return view('livewire.laporan.pengajuan', $data);
    }
}
