<?php

namespace App\Http\Livewire\InfoKegiatan;

use Livewire\Component;
use Livewire\WithPagination;
use DataTables;
use Illuminate\Http\Request;
use App\Models\m_informasi as informasi;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Components\PlaceAndDateOfBirth;

class Daftar extends Component
{

    public function render()
    {
        $data['title'] = 'Daftar Informasi Kegiatan';
        return view('livewire.info-kegiatan.daftar', $data);
    }

    public function getKegiatan(Request $request)
    {
        if ($request->ajax()) {
            $data = informasi::orderBy('kode_kegiatan', 'desc')->get();

            $get = DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('created_at_con', function($row) {
                        return placeAndDateOfBirth::make($row->created_at);
                    })
                    ->addColumn('tgl_kegiatan_con', function($row) {
                        return placeAndDateOfBirth::make($row->tgl_kegiatan);
                    })
                    ->addColumn('action', function($row) {
                        return '<button type="button" class="btn btn-sm btn-warning" onclick="edit(\''. $row->id .'\')">Edit</button>';
                        // return `<a href="{{ route('info-kegiatan-edit', `. $row->id .`) }}" class="btn btn-sm btn-warning">EDIT</a>`;
                    })
                    ->rawColumns(['tgl_kegiatan_con','created_at_con','action'])
                    ->make(true);
            return $get;
        }
    }
}
