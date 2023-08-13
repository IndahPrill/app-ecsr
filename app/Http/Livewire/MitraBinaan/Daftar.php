<?php

namespace App\Http\Livewire\MitraBinaan;

use Livewire\Component;
use Livewire\WithPagination;
use DataTables;
use Illuminate\Http\Request;
use App\Models\m_mitra_binaan as MrMitraBinaan;
use App\Models\m_pembayaran as MstrBayar;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Components\PlaceAndDateOfBirth;

class Daftar extends Component
{
    public function render()
    {
        $data['title'] = 'Daftar Mitra Binaan';
        return view('livewire.mitra-binaan.daftar', $data);
    }

    public function getDataBayar(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('m_pembayaran as a')
                    ->leftJoin('m_mitra_binaan as b', 'a.code_mb', '=', 'b.code_mb')
                    ->select('a.code_mb', 'b.nama', 'a.tgl_bayar', 'a.tgl_jth_tmpo', 'a.kesanggupan', 'a.jumlah', 'a.rencana', 'a.angsuran', 'a.angsuran_berjalan', 'a.tunggakan')
                    ->where('b.status', '=', '1')
                    ->get();

            $get = DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('tgl_bayar_convert', function($row) {
                        return placeAndDateOfBirth::make($row->tgl_bayar);
                    })
                    ->addColumn('tgl_jth_tmpo_convert', function($row) {
                        return placeAndDateOfBirth::make($row->tgl_jth_tmpo);
                    })
                    ->addColumn('action', function($row){
                        return '<button type="button" class="btn btn-sm btn-primary" onclick="detail(\''. $row->code_mb .'\')">Detail</button>';
                    })
                    ->rawColumns(['tgl_bayar_convert','tgl_jth_tmpo_convert','action'])
                    ->make(true);
            return $get;
        }
    }
}
