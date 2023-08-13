<?php

namespace App\Http\Livewire\Pengajuan;

use DataTables;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\m_mitra_binaan as MrMitraBinaan;
use App\Models\m_pembayaran as MstrBayar;
use App\Http\Livewire\Components\PlaceAndDateOfBirth;

class DaftarStaff extends Component
{
    public function render()
    {
        $data['title'] = 'Daftar Pengajuan';
        return view('livewire.pengajuan.daftar-staff', $data);
    }

    public function getDataMitraBinaan(Request $request)
    {
        if ($request->ajax()) {
            $data = MrMitraBinaan::select('code_mb', 'nama', 'tempat_lahir', 'tgl_lahir', 'kebangsaan', 'alamat', 'kabupaten_kota', 'no_tlp', 'no_ktp', 'jabatan', 'va', 'status')
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
                    ->addColumn('action', function($row){
                        $actionBtn = '';
                        if ($row->status == '0') {
                            $actionBtn = '<button type="button" class="btn btn-sm btn-primary" onclick="approve(\''. $row->code_mb .'\')">Setuju</button> <button type="button" class="btn btn-sm btn-danger" onclick="rejectProcess(\''. $row->code_mb .'\')">Tolak</button>';
                        } else {
                            $actionBtn = '<button type="button" class="btn btn-sm btn-primary" disabled >Setuju</button> <button type="button" class="btn btn-sm btn-danger" disabled >Tolak</button>';
                        }
                        return $actionBtn;
                    })
                    ->rawColumns(['ttl', 'status', 'action'])
                    ->make(true);
            return $get;
        }
    }

    public function approvalProcess(Request $request)
    {
        $input = $request->all();

        $code = $input['code'];
        $tgl_bayar = $input['tgl_bayar'];
        $tgl_jth_tmpo = $input['tgl_jth_tmpo'];

        if ($code) {
            $data = DB::table('m_mitra_binaan as a')
                    ->leftJoin('m_usaha as b', 'a.code_mb', '=', 'b.code_mb')
                    ->select('a.code_mb', 'b.kesanggupan', 'b.rencana')
                    ->where('a.code_mb', '=', $code)
                    ->get();

            $get = json_decode($data, true);

            // rumus perhitungan kredit
            $jumlahPinjaman = $get[0]['rencana']; // Jumlah pinjaman dalam mata uang
            $sukuBungaTahunan = 9; // Suku bunga tahunan dalam persen
            $tenorBulan = $get[0]['kesanggupan']; // Tenor pinjaman dalam bulan

            // Hitung pokok cicilan per bulan
            $pokokCicilanPerBulan = $jumlahPinjaman / $tenorBulan;

            // Hitung bunga per bulan
            $bungaPerBulan = ($jumlahPinjaman * ($sukuBungaTahunan / 100)) / $tenorBulan;

            // Total cicilan per bulan
            $totalCicilanPerBulan = round($pokokCicilanPerBulan + $bungaPerBulan);

            // Hitung total pembayaran keseluruhan
            $totalPembayaran = $totalCicilanPerBulan * $tenorBulan;

            $ins = MstrBayar::create([
                'code_mb' => $code,
                'tgl_bayar' => $tgl_bayar,
                'tgl_jth_tmpo' => $tgl_jth_tmpo,
                'jumlah' => $totalCicilanPerBulan,
                'kesanggupan' => $tenorBulan,
                'rencana' => $jumlahPinjaman,
                'angsuran' => 0,
                'angsuran_berjalan' => 0,
                'tunggakan' => 0,
            ]);

            $upd = MrMitraBinaan::where('code_mb', $code)->update(['status' => '1']);

            if ($ins && $upd) {
                return response()->json([
                    'status' => true,
                    'message' => 'Berhasil Disetujui!'
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Please enter your code!'
                ], 400);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Please enter your code!'
            ], 400);
        }
    }

    public function rejectProcess(Request $request)
    {
        $input = $request->all();

        if ($input['codemb']) {
            $data = MrMitraBinaan::where('code_mb', $input['codemb'])->update(['status' => '3']);

            if ($data) {
                return response()->json([
                    'status' => true,
                    'message' => 'Berhasil Ditolak!'
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Please enter your code!'
                ], 400);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Please enter your code!'
            ], 400);
        }
    }
}
