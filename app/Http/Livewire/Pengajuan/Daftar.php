<?php

namespace App\Http\Livewire\Pengajuan;

use DataTables;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\m_mitra_binaan as MrMitraBinaan;
use App\Http\Livewire\Components\PlaceAndDateOfBirth;

class Daftar extends Component
{
    use WithPagination;

    public function render()
    {
        $data['title'] = 'Daftar Pengajuan';
        return view('livewire.pengajuan.daftar', $data);
    }

    public function getDataMitraBinaan(Request $request)
    {
        if ($request->ajax()) {
            $data = MrMitraBinaan::select('code_mb', 'nama', 'tempat_lahir', 'tgl_lahir', 'kebangsaan', 'alamat', 'kabupaten_kota', 'no_tlp', 'no_ktp', 'jabatan', 'va', 'status')
                    ->where('code_mb', auth()->user()->code_mb)
                    ->orderBy('code_mb', 'desc')
                    ->get();

            $get = DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('ttl', function($row) {
                        if ($row->tempat_lahir == '' && $row->tgl_lahir != '') {
                            $result = placeAndDateOfBirth::make($row->tgl_lahir);
                        } else if ($row->tempat_lahir != '' && $row->tgl_lahir == '') {
                            $result = $row->tempat_lahir;
                        } else {
                            $result = $row->tempat_lahir.', '.placeAndDateOfBirth::make($row->tgl_lahir);
                        }
                        return $result;
                    })
                    ->addColumn('status', function ($row) {
                        if ($row->status == '0') {
                            $result = '<span class="badge bg-info">Pengajuan</span>';
                        } else if ($row->status == '1') {
                            $result = '<span class="badge bg-success">Setuju/Survei</span>';
                        } else if ($row->status == '2') {
                            $result = '<span class="badge bg-danger">Tolak</span>';
                        } else {
                            $result = '<span class="badge bg-danger">none</span>';
                        }
                        return $result;
                    })
                    ->rawColumns(['ttl','status'])
                    ->make(true);
            return $get;
        }
    }
}
