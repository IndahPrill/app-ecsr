<?php

namespace App\Http\Livewire\Perhitungan;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\pohon_keputusan_c45 as pohonKeputusanC45;

class PohonKeputusan extends Component
{
    public $output = ''; // The output to be displayed

    public function mount()
    {
        $this->generatePohonC45(0, 0);
    }

    public function generatePohonC45($idparent, $spasi)
    {
        $result = DB::table('pohon_keputusan_c45')->where('id_parent', $idparent)->get();

        foreach ($result as $row) {
            $spasiStr = str_repeat("|&nbsp;&nbsp;", $spasi);

            if ($row->keputusan === 'Aktif') {
                $keputusan = "<font color='green'>$row->keputusan</font>";
            } elseif ($row->keputusan === 'Tidak Aktif') {
                $keputusan = "<font color='red'>$row->keputusan</font>";
            } elseif ($row->keputusan === '?') {
                $keputusan = "<font color='blue'>$row->keputusan</font>";
            } else {
                $keputusan = "<b>$row->keputusan</b>";
            }

            $this->output .= "$spasiStr<font color='red'>$row->atribut</font> = $row->nilai_atribut (Aktif = $row->jml_aktif, Tidak Aktif = $row->jml_tdk_aktif) : $keputusan<br>";

            $this->generatePohonC45($row->id, $spasi + 1);
        }
    }

    public function render()
    {
        $data['title'] = 'Pohon Keputusan Algoritma C45';
        return view('livewire.perhitungan.pohon-keputusan', $data);
    }
}
