<?php

namespace App\Http\Livewire\Laporan;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class MitraBinaan extends Component
{
    public function render()
    {
        $data['title'] = 'Laporan Mitra Binaan';
        $data['data'] = DB::table('m_pembayaran as a')
                            ->leftJoin('m_mitra_binaan as b', 'a.code_mb', '=', 'b.code_mb')
                            ->select('a.code_mb', 'b.nama', 'a.tgl_bayar', 'a.tgl_jth_tmpo', 'a.kesanggupan', 'a.jumlah', 'a.rencana', 'a.angsuran', 'a.angsuran_berjalan', 'a.tunggakan')
                            ->where('b.status', '=', '1')
                            ->get();
        return view('livewire.laporan.mitra-binaan', $data);
    }
}
