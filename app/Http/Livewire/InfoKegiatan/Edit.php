<?php

namespace App\Http\Livewire\InfoKegiatan;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\m_informasi as informasi;

class Edit extends Component
{
    /**
     * define variable
     *
     * @var string
     *
     */
    public $postId, $nama_kegiatan, $tgl_kegiatan, $ktgr_usaha, $produk_usaha, $desk_kegiatan;

    public function render()
    {
        $data['title'] = 'Edit Informasi Kegiatan';
        return view('livewire.info-kegiatan.edit', $data);
    }

    public function getkegiatanById(Request $request)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $data = informasi::find($input['id']);

            return response()->json([
                'status' => true,
                'message' => 'success get data kegiatan',
                'data' => $data
            ], 200);
        }
        return response()->json([
            'status' => false,
            'message' => 'fail get data kegiatan',
            'data' => []
        ], 400);
    }

    /**
     * store the user inputted post data in the posts table
     * @return void
     */
    public function update(Request $request)
    {
        try {
            if ($request->ajax()) {
                $input = $request->all();
                $informasi = informasi::find($input['id']);
                $informasi->update([
                    'nama_kegiatan'     => $input['nama_kegiatan'],
                    'tgl_kegiatan'      => $input['tgl_kegiatan'],
                    'kategori_usaha'    => $input['ktgr_usaha'],
                    'produk_usaha'      => $input['produk_usaha'],
                    'desk_kegiatan'     => $input['desk_kegiatan'],
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => 'fail update data kegiatan',
                'data' => []
            ], 400);

            // session()->flash('success','Updated Successfully!!');
            // return redirect()->route('info-kegiatan-daftar');
        } catch (\Exception $e) {
            // Set Flash Message
            return response()->json([
                'status' => false,
                'message' => 'fail update data kegiatan',
                'data' => $e->getMessage()
            ], 400);
            // session()->flash('error','Something goes wrong!! '.$e->getMessage());
        }
    }
}
