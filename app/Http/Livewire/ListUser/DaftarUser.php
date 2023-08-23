<?php

namespace App\Http\Livewire\ListUser;

use Livewire\Component;
use DataTables;
use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\DB;
use App\Http\Livewire\Components\PlaceAndDateOfBirth;

class DaftarUser extends Component
{
    public function render()
    {
        $data['title'] = 'List User';
        return view('livewire.list-user.daftar-user', $data);
    }

    public function getDataUser(Request $request)
    {
        if ($request->ajax()) {
            $data = user::get();

            $get = DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('created_at_con', function($row) {
                        return placeAndDateOfBirth::make($row->created_at);
                    })
                    ->addColumn('action', function($row){
                        if ($row->user_valid == '1') {
                            return '<button type="button" class="btn btn-sm btn-danger" onclick="accessProcess(\''. $row->id .'\', \''. $row->user_valid .'\')"><i class="fa-solid fa-key"></i> Non Aktif</button>';
                        } else {
                            return '<button type="button" class="btn btn-sm btn-primary" onclick="accessProcess(\''. $row->id .'\', \''. $row->user_valid .'\')"><i class="fa-solid fa-key"></i> Aktif</button>';
                        }
                    })
                    ->rawColumns(['created_at_con','action'])
                    ->make(true);
            return $get;
        }
    }

    public function updAksesUser(Request $request)
    {
        $input = $request->all();

        $id = $input['id'];
        $valid = $input['valid'];

        if ($valid == '1') {
            $upd = user::where('id', $id)->update(['user_valid' => '2', 'status_login' => '2']);
            $msg = "Aktif";
        } else {
            $upd = user::where('id', $id)->update(['user_valid' => '1', 'status_login' => '2']);
            $msg = "Non Aktif";
        }

        if ($upd) {
            return response()->json([
                'status' => true,
                'message' => $msg
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Gagal Periksa datanya!'
            ], 400);
        }
    }
}
