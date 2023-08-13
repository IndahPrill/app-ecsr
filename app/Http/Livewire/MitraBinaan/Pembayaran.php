<?php

namespace App\Http\Livewire\MitraBinaan;

use DataTables;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Components\PlaceAndDateOfBirth;

class Pembayaran extends Component
{
    public function render()
    {
        $data['title'] = 'Pembayaran Mitra Binaan';
        return view('livewire.mitra-binaan.pembayaran', $data);
    }

    public function getListBayar(Request $request)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $data = DB::table('d_pembayaran as a')
                    ->leftJoin('m_mitra_binaan as b', 'a.code_mb', '=', 'b.code_mb')
                    ->where('b.status', '=', '1')
                    ->where('a.code_mb', '=', $input['codemb'])
                    ->get();

            $get = DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('tgl_bayar_convert', function($row) {
                        return placeAndDateOfBirth::make($row->tgl_bayar);
                    })
                    ->addColumn('tgl_jth_tmpo_convert', function($row) {
                        return placeAndDateOfBirth::make($row->tgl_jth_tmpo);
                    })
                    ->rawColumns(['tgl_jth_tmpo_convert','tgl_bayar_convert'])
                    ->make(true);
            return $get;
        }
    }

    public function getMstrBayar(Request $request)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $data = DB::table('m_pembayaran as a')
                    ->leftJoin('m_mitra_binaan as b', 'a.code_mb', '=', 'b.code_mb')
                    ->leftJoin('m_usaha as c', 'a.code_mb', '=', 'c.code_mb')
                    ->select('a.code_mb', 'b.nama', 'c.nama as nm_usaha', 'c.alamat', 'b.va', 'a.angsuran')
                    ->where('a.code_mb', '=', $input['codemb'])
                    ->where('b.status', '=', '1')
                    ->get();

            return response()->json([
                'status' => true,
                'message' => 'success get data master pembayaran',
                'data' => $data
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'fail get data master pembayaran',
            'data' => []
        ], 400);
    }
}
