<?php

namespace App\Http\Livewire\Perhitungan;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\data_survey as dataSuervey;
use App\Models\iterasi_c45 as iterasiC45;
use App\Models\mining_c45 as miningC45;
use App\Models\atribut;
use App\Models\pohon_keputusan_c45 as pohonKeputusanC45;

class DataSurvey extends Component
{
    public function render()
    {
        $data['title'] = 'Daftar Data Survey';
        return view('livewire.perhitungan.data-survey', $data);
    }

    //---------- KUMPULAN FUNGSI YANG AKAN DILAKUKAN DALAM PROSES MINING ----------
    public function process_calculate()
    {
        $this->populateDb();
        $this->miningC45('', '');
        return redirect()->route('perhitungan-hasil');
    }

    public function miningC45($atribut, $nilai_atribut)
    {
        $this->perhitunganC45($atribut, $nilai_atribut);
        $this->insertAtributPohonKeputusan($atribut, $nilai_atribut);
        $this->getInfGainMax($atribut, $nilai_atribut);
        $this->replaceNull();
    }

    //#1# Hapus semua DB dan insert default atribut dan nilai atribut
    public function populateDB()
    {
        miningC45::truncate();
        iterasiC45::truncate();
        pohonKeputusanC45::truncate();
        $this->populateAtribut();
    }

    public function populateAtribut()
    {
        atribut::truncate();

        $data = [
            ['atribut' => 'total', 'nilai_atribut' => 'total'],
            ['atribut' => 'tahun', 'nilai_atribut' => '2021'],
            ['atribut' => 'tahun', 'nilai_atribut' => '2022'],
            ['atribut' => 'wilayah', 'nilai_atribut' => 'Bandung'],
            ['atribut' => 'wilayah', 'nilai_atribut' => 'Bandung Selatan'],
            ['atribut' => 'wilayah', 'nilai_atribut' => 'Bandung Barat'],
            ['atribut' => 'wilayah', 'nilai_atribut' => 'Subang'],
            ['atribut' => 'status_klasifikasi', 'nilai_atribut' => 'lancar'],
            ['atribut' => 'status_klasifikasi', 'nilai_atribut' => 'kurang lancar'],
            ['atribut' => 'status_klasifikasi', 'nilai_atribut' => 'diragukan'],
            ['atribut' => 'status_klasifikasi', 'nilai_atribut' => 'macet'],
            ['atribut' => 'jenis_usaha', 'nilai_atribut' => 'perdagangan'],
            ['atribut' => 'jenis_usaha', 'nilai_atribut' => 'perkebunan'],
            ['atribut' => 'jenis_usaha', 'nilai_atribut' => 'peternakan'],
            ['atribut' => 'jenis_usaha', 'nilai_atribut' => 'perikanan'],
            ['atribut' => 'jenis_usaha', 'nilai_atribut' => 'industri'],
            ['atribut' => 'jenis_usaha', 'nilai_atribut' => 'jasa'],
        ];
        atribut::insert($data);
    }

    // ================ FUNGSI PERHITUNGAN C45 =================
    public function perhitunganC45($atribut, $nilai_atribut)
    {
        if (empty($atribut) AND empty($nilai_atribut)) {
        //#2# Jika atribut yg diinputkan kosong, maka lakukan perhitungan awal
            $kondisiAtribut = ""; // set kondisi atribut kosong
        } else if (!empty($atribut) AND !empty($nilai_atribut)) {
            // jika atribut tdk kosong, maka select kondisi atribut dari DB
            $rowKondisiAtribut = DB::table('pohon_keputusan_c45')
                                    ->select('kondisi_atribut')
                                    ->where('atribut', $atribut)
                                    ->where('nilai_atribut', $nilai_atribut)
                                    ->orderBy('id', 'asc')
                                    ->limit(1)
                                    ->first();
            $kondisiAtribut = str_replace("~", "'", $rowKondisiAtribut->kondisi_atribut); // replace string ~ menjadi '
        }

        $sqlAtribut = DB::table('atribut')->select('atribut')->distinct()->get();

        foreach ($sqlAtribut as $rowGetAtribut) {
            $getAtribut = $rowGetAtribut->atribut;
            // dd($getAtribut);
            //#3# Jika atribut = total, maka hitung jumlah kasus total, jumlah kasus layak dan jumlah kasus tdk layak
            if ($getAtribut === 'total') {
                //#3# Jika atribut = total, maka hitung jumlah kasus total, jumlah kasus layak dan jumlah kasus tdk layak
                // hitung jumlah kasus total
                if ($kondisiAtribut != "") {
                    $rowJumlahKasusTotal = DB::table('data_survey')
                                            ->select(DB::raw('count(*) as jumlah_total'))
                                            ->whereNotNull('status_usaha')
                                            ->whereRaw($kondisiAtribut)
                                            ->first();
                } else {
                    $rowJumlahKasusTotal = DB::table('data_survey')
                                            ->select(DB::raw('count(*) as jumlah_total'))
                                            ->whereNotNull('status_usaha')
                                            ->first();
                }
                $getJumlahKasusTotal = $rowJumlahKasusTotal->jumlah_total;

                // hitung jumlah kasus Aktif
                if ($kondisiAtribut != "") {
                    $rowJumlahKasusAktif = DB::table('data_survey')
                                            ->select(DB::raw('count(*) as jumlah_aktif'))
                                            ->where('status_usaha', '<>', 'Aktif')
                                            ->whereRaw($kondisiAtribut)
                                            ->first();
                } else {
                    $rowJumlahKasusAktif = DB::table('data_survey')
                                            ->select(DB::raw('count(*) as jumlah_aktif'))
                                            ->where('status_usaha', '<>', 'Aktif')
                                            ->first();
                }
                $getJumlahKasusAktif = $rowJumlahKasusAktif->jumlah_aktif;

                // hitung jumlah kasus tdk Aktif
                if ($kondisiAtribut != "") {
                    $rowJumlahKasusTidakAktif = DB::table('data_survey')
                                                ->select(DB::raw('count(*) as jumlah_tidak_aktif'))
                                                ->where('status_usaha', '<>', 'Tidak Aktif')
                                                ->whereRaw($kondisiAtribut)
                                                ->first();
                } else {
                    $rowJumlahKasusTidakAktif = DB::table('data_survey')
                                                ->select(DB::raw('count(*) as jumlah_tidak_aktif'))
                                                ->where('status_usaha', '<>', 'Tidak Aktif')
                                                ->first();
                }
                $getJumlahKasusTidakAktif = $rowJumlahKasusTidakAktif->jumlah_tidak_aktif;

                //#4# Insert jumlah kasus total, jumlah kasus layak dan jumlah kasus tdk layak ke DB
                // insert ke database mining_c45
                DB::table("mining_c45")->insert([
                    'atribut' => 'Total',
                    'nilai_atribut' => 'Total',
                    'jml_kasus_total' =>$getJumlahKasusTotal,
                    'jml_aktif' =>$getJumlahKasusAktif,
                    'jml_tdk_aktif' =>$getJumlahKasusTidakAktif,
                    'entropy' => '',
                    'inf_gain' => '',
                    'inf_gain_temp' => '',
                    'split_info' => '',
                    'split_info_temp' => '',
                    'gain_ratio' => ''
                ]);
            } else {
                //#5# Jika atribut != total (atribut lainnya), maka hitung jumlah kasus total, jumlah kasus layak dan jumlah kasus tdk layak masing2 atribut
                // ambil nilai atribut
                $sqlNilaiAtribut = DB::table('atribut')
                                    ->select('nilai_atribut')
                                    ->where('atribut', $getAtribut)
                                    ->orderBy('id', 'asc')
                                    ->get();
                foreach ($sqlNilaiAtribut as $rowNilaiAtribut) {
                    $getNilaiAtribut = $rowNilaiAtribut->nilai_atribut;

                    // set kondisi dimana nilai_atribut = berdasakan masing2 atribut dan status data = data training
                    $kondisi = "$getAtribut = '$getNilaiAtribut' AND status_usaha is not null";

                    // hitung jumlah kasus per atribut
                    if ($kondisiAtribut != "") {
                        $rowJumlahKasusTotalAtribut = DB::table('data_survey')
                                                        ->select(DB::raw('COUNT(*) as jumlah_total'))
                                                        ->whereRaw($kondisi)
                                                        ->whereRaw($kondisiAtribut)
                                                        ->first();
                    } else {
                        $rowJumlahKasusTotalAtribut = DB::table('data_survey')
                                                        ->select(DB::raw('COUNT(*) as jumlah_total'))
                                                        ->whereRaw($kondisi)
                                                        ->first();
                    }
                    $getJumlahKasusTotalAtribut = $rowJumlahKasusTotalAtribut->jumlah_total;

                    // hitung jumlah kasus Aktif
                    if ($kondisiAtribut != "") {
                        $rowJumlahKasusAktifAtribut = DB::table('data_survey')
                                                        ->select(DB::raw('COUNT(*) as jumlah_aktif'))
                                                        ->whereRaw($kondisi)
                                                        ->whereRaw($kondisiAtribut)
                                                        ->where('status_usaha', '<>', 'Aktif')
                                                        ->first();
                    } else {
                        $rowJumlahKasusAktifAtribut = DB::table('data_survey')
                                                        ->select(DB::raw('COUNT(*) as jumlah_aktif'))
                                                        ->whereRaw($kondisi)
                                                        ->where('status_usaha', '<>', 'Aktif')
                                                        ->first();
                    }
                    $getJumlahKasusAktifAtribut = $rowJumlahKasusAktifAtribut->jumlah_aktif;

                    // hitung jumlah kasus TDK Aktif
                    if ($kondisiAtribut != "") {
                        $rowJumlahKasusTidakAktifAtribut = DB::table('data_survey')
                                                            ->select(DB::raw('COUNT(*) as jumlah_tidak_aktif'))
                                                            ->whereRaw($kondisi)
                                                            ->whereRaw($kondisiAtribut)
                                                            ->where('status_usaha', '<>', 'Tidak Aktif')
                                                            ->first();
                    } else {
                        $rowJumlahKasusTidakAktifAtribut = DB::table('data_survey')
                                                            ->select(DB::raw('COUNT(*) as jumlah_tidak_aktif'))
                                                            ->whereRaw($kondisi)
                                                            ->where('status_usaha', '<>', 'Tidak Aktif')
                                                            ->first();
                    }
                    $getJumlahKasusTidakAktifAtribut = $rowJumlahKasusTidakAktifAtribut->jumlah_tidak_aktif;

                    //#6# Insert jumlah kasus total, jumlah kasus layak dan jumlah kasus tdk layak masing2 atribut ke DB
                    // insert ke database mining_c45
                    DB::table("mining_c45")->insert([
                        'atribut' => $getAtribut,
                        'nilai_atribut' => $getNilaiAtribut,
                        'jml_kasus_total' => $getJumlahKasusTotalAtribut,
                        'jml_aktif' => $getJumlahKasusAktifAtribut,
                        'jml_tdk_aktif' => $getJumlahKasusTidakAktifAtribut,
                        'entropy' => '',
                        'inf_gain' => '',
                        'inf_gain_temp' => '',
                        'split_info' => '',
                        'split_info_temp' => '',
                        'gain_ratio' => ''
                    ]);

                    //#7# Lakukan perhitungan entropy
                    // perhitungan entropy
                    $sqlEntropy = DB::table('mining_c45')->select('id', 'jml_kasus_total', 'jml_aktif', 'jml_tdk_aktif')->get();
                    foreach ($sqlEntropy as $rowEntropy) {
                        $getJumlahKasusTotalEntropy = $rowEntropy->jml_kasus_total;
                        $getJumlahKasusLayakEntropy = $rowEntropy->jml_aktif;
                        $getJumlahKasusTidakLayakEntropy = $rowEntropy->jml_tdk_aktif;
                        $idEntropy = $rowEntropy->id;

                        // jika jml kasus = 0 maka entropy = 0
                        if ($getJumlahKasusTotalEntropy == 0 OR $getJumlahKasusLayakEntropy == 0 OR $getJumlahKasusTidakLayakEntropy == 0) {
                            $getEntropy = 0;
                        // jika jml kasus layak = jml kasus tdk layak, maka entropy = 1
                        } else if ($getJumlahKasusLayakEntropy == $getJumlahKasusTidakLayakEntropy) {
                            $getEntropy = 1;
                        } else { // jika jml kasus != 0, maka hitung rumus entropy:
                            $perbandingan_layak = $getJumlahKasusLayakEntropy / $getJumlahKasusTotalEntropy;
                            $perbandingan_tidak_layak = $getJumlahKasusTidakLayakEntropy / $getJumlahKasusTotalEntropy;

                            $rumusEntropy = (-($perbandingan_layak) * log($perbandingan_layak,2)) + (-($perbandingan_tidak_layak) * log($perbandingan_tidak_layak,2));
                            $getEntropy = round($rumusEntropy,4); // 4 angka di belakang koma
                        }

                        //#8# Update nilai entropy
                        // update nilai entropy
                        DB::table('mining_c45')->where('id', $idEntropy)->update(['entropy' => $getEntropy]);
                    }

                    //#9# Lakukan perhitungan information gain
                    // perhitungan information gain
                    // ambil nilai entropy dari total (jumlah kasus total)
                    $rowJumlahKasusTotalInfGain = DB::table('mining_c45')
                                                    ->select('jml_kasus_total', 'entropy')
                                                    ->where('atribut', 'Total')
                                                    ->first();
                    $getJumlahKasusTotalInfGain = $rowJumlahKasusTotalInfGain->jml_kasus_total;
                    // rumus information gain
                    $getInfGain = (-(($getJumlahKasusTotalEntropy / $getJumlahKasusTotalInfGain) * ($getEntropy)));

                    //#10# Update information gain tiap nilai atribut (temporary)
                    // update inf_gain_temp (utk mencari nilai masing2 atribut)
                    DB::table('mining_c45')->where('id', $idEntropy)->update(['inf_gain_temp' => $getInfGain]);
                    $getEntropy = $rowJumlahKasusTotalInfGain->entropy;

                    // jumlahkan masing2 inf_gain_temp atribut
                    // $sqlAtributInfGain = mysql_query("SELECT SUM(inf_gain_temp) as inf_gain FROM mining_c45 WHERE atribut = '$getAtribut'");
                    $sqlAtributInfGain = DB::table('mining_c45')
                                            ->select(DB::raw('sum(inf_gain_temp) as inf_gain'))
                                            ->where('atribut', $getAtribut)
                                            ->get();
                    foreach ($sqlAtributInfGain as $rowAtributInfGain) {
                        $getAtributInfGain = $rowAtributInfGain->inf_gain;

                        // hitung inf gain
                        $getInfGainFix = round(($getEntropy + $getAtributInfGain),4);

                        //#11# Looping perhitungan information gain, sehingga mendapatkan information gain tiap atribut. Update information gain
                        // update inf_gain (fix)
                        DB::table('mining_c45')->where('atribut', $getAtribut)->update(['inf_gain' => $getInfGainFix]);
                    }

                    //#12# Lakukan perhitungan split info
                    // rumus split info
                    if($getJumlahKasusTotalEntropy != 0) {
                        $getSplitInfo = (($getJumlahKasusTotalEntropy / $getJumlahKasusTotalInfGain) * (log(($getJumlahKasusTotalEntropy / $getJumlahKasusTotalInfGain),2)));
                    } else {
                        $getSplitInfo = 0;
                    }

                    //#13# Update split info tiap nilai atribut (temporary)
                    // update split_info_temp (utk mencari nilai masing2 atribut)
                    DB::table('mining_c45')->where('id', $idEntropy)->update(['split_info_temp' => $getSplitInfo]);

                    // jumlahkan masing2 split_info_temp dari tiap atribut
                    // $sqlAtributSplitInfo = mysql_query("SELECT SUM(split_info_temp) as split_info FROM mining_c45 WHERE atribut = '$getAtribut'");
                    $sqlAtributSplitInfo = DB::table('mining_c45')
                                            ->select(DB::raw('SUM(split_info_temp) as split_info'))
                                            ->where('atribut', $getAtribut)
                                            ->get();
                    foreach ($sqlAtributSplitInfo as $rowAtributSplitInfo) {
                        $getAtributSplitInfo = $rowAtributSplitInfo->split_info;

                        // split info fix (4 angka di belakang koma)
                        $getSplitInfoFix = -(round($getAtributSplitInfo,4));

                        //#14# Looping perhitungan split info, sehingga mendapatkan information gain tiap atribut. Update information gain
                        // update split info (fix)
                        DB::table('mining_c45')->where('atribut', $getAtribut)->update(['split_info' => $getSplitInfoFix]);
                    }
                }

                //#15# Lakukan perhitungan gain ratio
                // $sqlGainRatio = mysql_query("SELECT id, inf_gain, split_info FROM mining_c45");
                $sqlGainRatio = DB::table('mining_c45')->select('id', 'inf_gain', 'split_info')->get();
                foreach ($sqlGainRatio as $rowGainRatio) {
                    $idGainRatio = $rowGainRatio->id;
                    // jika nilai inf gain == 0 dan split info == 0, maka gain ratio = 0
                    if ($rowGainRatio->inf_gain != "" AND $rowGainRatio->split_info != 0) {
                        if ($rowGainRatio->inf_gain == 0 AND $rowGainRatio->split_info == 0){
                            $getGainRatio = 0;
                        } else {
                            // rumus gain ratio
                            $getGainRatio = round(($rowGainRatio->inf_gain / $rowGainRatio->split_info),4);
                        }
                        //#16# Update gain ratio dari setiap atribut
                        DB::table('mining_c45')->where('id', $idGainRatio)->update(['gain_ratio' => $getGainRatio]);
                    }
                }
            }
        }
    }

    public function insertAtributPohonKeputusan($atribut, $nilai_atribut)
    {
        // ambil nilai inf gain tertinggi dimana hanya 1 atribut saja yg dipilih
        $getGainratio = DB::table('mining_c45')->select(DB::raw('max(gain_ratio)'));
        $rowInfGainMaxTemp = DB::table('mining_c45')
                                ->select('atribut', 'gain_ratio')->distinct()
                                ->whereIn('gain_ratio', $getGainratio)
                                ->limit(1)
                                ->first();
        // hanya ambil atribut dimana jumlah kasus totalnya tidak kosong
        if ($rowInfGainMaxTemp->gain_ratio > 0) {
            // ambil nilai atribut yang memiliki nilai inf gain max
            $sqlInfGainMax = DB::table('mining_c45')->where('atribut', $rowInfGainMaxTemp->atribut)->get();
            foreach ($sqlInfGainMax as $rowInfGainMax) {
                if ($rowInfGainMax->jml_aktif == 0 AND $rowInfGainMax->jml_tdk_aktif == 0) {
                    $keputusan = 'Kosong'; // jika jml_aktif = 0 dan jml_tdk_aktif = 0, maka keputusan Null
                } else if ($rowInfGainMax->jml_aktif !== 0 AND $rowInfGainMax->jml_tdk_aktif == 0) {
                    $keputusan = 'Aktif'; // jika jml_aktif != 0 dan jml_tdk_aktif = 0, maka keputusan Layak
                } else if ($rowInfGainMax->jml_aktif == 0 AND $rowInfGainMax->jml_tdk_aktif !== 0) {
                    $keputusan = 'Tidak Aktif'; // jika jml_aktif = 0 dan jml_tdk_aktif != 0, maka keputusan Tidak Layak
                } else {
                    $keputusan = '?'; // jika jml_aktif != 0 dan jml_tdk_aktif != 0, maka keputusan ?
                }

                if (empty($atribut) AND empty($nilai_atribut)) {
                    //#18# Jika atribut yang diinput kosong (atribut awal) maka insert ke pohon keputusan id_parent = 0
                    // set kondisi atribut = AND atribut = nilai atribut
                    // $kondisiAtribut = "AND ".$rowInfGainMax->atribut." = ~".$rowInfGainMax->nilai_atribut."~";
                    $kondisiAtribut = $rowInfGainMax->atribut." = ~".$rowInfGainMax->nilai_atribut."~";
                    // insert ke tabel pohon keputusan
                    DB::table("pohon_keputusan_c45")->insert([
                        'atribut' => $rowInfGainMax->atribut,
                        'nilai_atribut' => $rowInfGainMax->nilai_atribut,
                        'id_parent' => 0,
                        'jml_aktif' => $rowInfGainMax->jml_aktif,
                        'jml_tdk_aktif' => $rowInfGainMax->jml_tdk_aktif,
                        'keputusan' => $keputusan,
                        'diproses' => 'Belum',
                        'kondisi_atribut' => $kondisiAtribut,
                        'looping_kondisi' => 'Belum'
                    ]);
                }

                //#19# Jika atribut yang diinput tidak kosong maka insert ke pohon keputusan dimana id_parent diambil dari tabel pohon keputusan sebelumnya (where atribut = atribut yang diinput)
                else if (!empty($atribut) AND !empty($nilai_atribut)) {
                    $sqlInfGainMax = DB::table('pohon_keputusan_c45')
                                        ->select('id', 'atribut', 'nilai_atribut', 'jml_aktif', 'jml_tdk_aktif')
                                        ->where('atribut', $atribut)
                                        ->where('nilai_atribut', $nilai_atribut)
                                        ->orderBy('id', 'desc')
                                        ->limit(1)
                                        ->get();

                    $perhitunganPessimisticChildIncrement = 0;
                    foreach ($sqlInfGainMax as $rowIdParent) {
                        // insert ke tabel pohon keputusan
                        DB::table("pohon_keputusan_c45")->insert([
                            'atribut' => $rowInfGainMax->atribut,
                            'nilai_atribut' => $rowInfGainMax->nilai_atribut,
                            'id_parent' => $rowIdParent->id,
                            'jml_aktif' => $rowInfGainMax->jml_aktif,
                            'jml_tdk_aktif' => $rowInfGainMax->jml_tdk_aktif,
                            'keputusan' => $keputusan,
                            'diproses' => 'Belum',
                            'kondisi_atribut' => '',
                            'looping_kondisi' => 'Belum'
                        ]);

                        // hitung Pessimistic error rate parent dan child
                        $perhitunganParentPrePruning = $this->loopingPerhitunganPrePruning($rowIdParent->jml_aktif, $rowIdParent->jml_tdk_aktif);
                        $perhitunganChildPrePruning = $this->loopingPerhitunganPrePruning($rowInfGainMax->jml_aktif, $rowInfGainMax->jml_tdk_aktif);
                        // dump($rowInfGainMax->jml_aktif, $rowInfGainMax->jml_tdk_aktif);
                        // dump($perhitunganChildPrePruning);

                        // hitung average Pessimistic error rate child
                        $perhitunganPessimisticChild = (($rowInfGainMax->jml_aktif + $rowInfGainMax->jml_tdk_aktif) / ($rowIdParent->jml_aktif + $rowIdParent->jml_tdk_aktif)) * $perhitunganChildPrePruning;
                        // Increment average Pessimistic error rate child
                        $perhitunganPessimisticChildIncrement += $perhitunganPessimisticChild;
                        $perhitunganPessimisticChildIncrement = round($perhitunganPessimisticChild, 4);

                        // jika error rate pada child lebih besar dari error rate parent
                        if ($perhitunganPessimisticChildIncrement > $perhitunganParentPrePruning) {
                            // hapus child (child tidak diinginkan)
                            DB::table('pohon_keputusan_c45')->where('id_parent', $rowIdParent->id)->delete();

                            // jika jml kasus layak lbh besar, maka keputusan == layak
                            if ($rowIdParent->jml_aktif > $rowIdParent->jml_tdk_aktif) {
                                $keputusanPrePruning = 'Aktif';
                                // update keputusan parent
                                DB::table('pohon_keputusan_c45')->where('id', $rowIdParent->id)->update(['keputusan' => $keputusanPrePruning]);
                            // jika jml tdk kasus layak lbh besar, maka keputusan == tdk layak
                            } else if ($rowIdParent->jml_aktif < $rowIdParent->jml_tdk_aktif) {
                                $keputusanPrePruning = 'Tidak Aktif';
                                // update keputusan parent
                                DB::table('pohon_keputusan_c45')->where('id', $rowIdParent->id)->update(['keputusan' => $keputusanPrePruning]);
                            }
                        }
                    }

                }
            }
        }
        $this->loopingKondisiAtribut();
    }

    //#20# Lakukan looping kondisi atribut untuk diproses pada fungsi perhitunganC45()
    public function loopingKondisiAtribut()
    {
        // ambil semua id dan kondisi atribut
        // $sqlLoopingKondisi = mysql_query("SELECT id, kondisi_atribut FROM pohon_keputusan_c45");
        $sqlLoopingKondisi = DB::table('pohon_keputusan_c45')
                                ->select('id', 'kondisi_atribut')
                                ->get();

        foreach ($sqlLoopingKondisi as $rowLoopingKondisi) {
            // select semua data dimana id_parent = id awal
            // $sqlUpdateKondisi = mysql_query("SELECT * FROM pohon_keputusan_c45 WHERE id_parent = $rowLoopingKondisi->id AND looping_kondisi = 'Belum'");
            $sqlUpdateKondisi = DB::table('pohon_keputusan_c45')
                                    ->where('id_parent', $rowLoopingKondisi->id)
                                    ->where('looping_kondisi', 'Belum')
                                    ->get();

            foreach ($sqlUpdateKondisi as $rowUpdateKondisi) {
                // set kondisi: kondisi sebelumnya yg diselect berdasarkan id_parent ditambah 'AND atribut = nilai atribut'
                $kondisiAtribut = "$rowLoopingKondisi->kondisi_atribut AND $rowUpdateKondisi->atribut = ~$rowUpdateKondisi->nilai_atribut~";
                // update kondisi atribut
                DB::table('pohon_keputusan_c45')
                    ->where('id', $rowUpdateKondisi->id)
                    ->update(['kondisi_atribut' => $kondisiAtribut, 'looping_kondisi' => 'Sudah']);
            }
        }
        $this->insertIterasi();
    }

    //#21# Insert iterasi nilai perhitungan ke DB
    public function insertIterasi()
    {
        $getGainratio = DB::table('mining_c45')->select(DB::raw('max(gain_ratio)'));
        $rowInfGainMaxIterasi = DB::table('mining_c45')
                                    ->select('atribut', 'gain_ratio')->distinct()
                                    ->whereIn('gain_ratio', $getGainratio)
                                    ->limit(1)
                                    ->first();

        // hanya ambil atribut dimana jumlah kasus totalnya tidak kosong
        if ($rowInfGainMaxIterasi->gain_ratio > 0) {
            $kondisiAtribut = $rowInfGainMaxIterasi->atribut;
            $iterasiKe = 1;
            $sqlInsertIterasiC45 = DB::table('mining_c45')->get();

            foreach ($sqlInsertIterasiC45 as $rowInsertIterasiC45) {
                // insert ke tabel iterasi
                DB::table("iterasi_c45")->insert([
                    'iterasi' => $iterasiKe,
                    'atribut_gain_ratio_max' => $kondisiAtribut,
                    'atribut' => $rowInsertIterasiC45->atribut,
                    'nilai_atribut' => $rowInsertIterasiC45->nilai_atribut,
                    'jml_kasus_total' => $rowInsertIterasiC45->jml_kasus_total,
                    'jml_aktif' => $rowInsertIterasiC45->jml_aktif,
                    'jml_tdk_aktif' => $rowInsertIterasiC45->jml_tdk_aktif,
                    'entropy' => $rowInsertIterasiC45->entropy,
                    'inf_gain' => $rowInsertIterasiC45->inf_gain,
                    'split_info' => $rowInsertIterasiC45->split_info,
                    'gain_ratio' => $rowInsertIterasiC45->gain_ratio,
                ]);
                // mysql_query("INSERT INTO iterasi_c45 VALUES ('', $iterasiKe, '$kondisiAtribut', '$rowInsertIterasiC45[atribut]', '$rowInsertIterasiC45[nilai_atribut]', '$rowInsertIterasiC45[jml_kasus_total]', '$rowInsertIterasiC45[jml_laris]', '$rowInsertIterasiC45[jml_tdk_laris]', '$rowInsertIterasiC45[entropy]', '$rowInsertIterasiC45[inf_gain]', '$rowInsertIterasiC45[split_info]', '$rowInsertIterasiC45[gain_ratio]')");
                $iterasiKe++;
            }
        }
    }

    //#22# Ambil information gain max untuk diproses pada fungsi loopingMiningC45()
    public function getInfGainMax($atribut, $nilai_atribut)
    {
        // select inf gain max
        $getGainratio = DB::table('mining_c45')->select(DB::raw('max(gain_ratio)'));
        $sqlInfGainMaxAtribut = DB::table('mining_c45')
                                ->select('atribut', 'gain_ratio')->distinct()
                                ->whereIn('gain_ratio', $getGainratio)
                                ->limit(1)
                                ->get();

        foreach ($sqlInfGainMaxAtribut as $rowInfGainMaxAtribut) {
            $inf_gain_max_atribut = $rowInfGainMaxAtribut->atribut;
            if (empty($atribut) AND empty($nilai_atribut)) {
                // jika atribut kosong, proses atribut dgn inf gain max pada fungsi loopingMiningC45()
                $this->loopingMiningC45($inf_gain_max_atribut);
            } else if (!empty($atribut) AND !empty($nilai_atribut)) {
                // jika atribut tdk kosong, maka update diproses = sudah pada tabel pohon_keputusan_c45
                DB::table('pohon_keputusan_c45')->where('nilai_atribut', $nilai_atribut)->update(['diproses' => 'Sudah']);
                // proses atribut dgn inf gain max pada fungsi loopingMiningC45()
                $this->loopingMiningC45($inf_gain_max_atribut);
            }
        }
    }

    //#23# Looping proses mining dimana atribut dgn information gain max yang akan diproses pada fungsi miningC45()
    public function loopingMiningC45($inf_gain_max_atribut)
    {
        // $sqlBelumAdaKeputusanLagi = mysql_query("SELECT * FROM pohon_keputusan_c45 WHERE keputusan = '?' and diproses = 'Belum' AND atribut = '$inf_gain_max_atribut'");
        $sqlBelumAdaKeputusanLagi = DB::table('pohon_keputusan_c45')
                                    ->where('keputusan', '?')
                                    ->where('diproses', 'Belum')
                                    ->where('atribut', $inf_gain_max_atribut)
                                    ->get();

        foreach ($sqlBelumAdaKeputusanLagi as $rowBelumAdaKeputusanLagi) {
            if ($rowBelumAdaKeputusanLagi->id_parent == 0) {
                $this->populateAtribut();
            }
            $atribut = $rowBelumAdaKeputusanLagi->atribut;
            $nilai_atribut = $rowBelumAdaKeputusanLagi->nilai_atribut;
            $kondisiAtribut = "AND $atribut = \'$nilai_atribut\'";

            miningC45::truncate();
            DB::table('atribut')->where('atribut', $inf_gain_max_atribut)->delete();

            $this->miningC45($atribut, $nilai_atribut);
            $this->populateAtribut();
        }
    }

    // rumus menghitung Pessimistic error rate
    public function perhitunganPrePruning($r, $z, $n)
    {
        $rumus = ($r + (($z * $z) / (2 * $n)) + ($z * (sqrt(($r / $n) - (($r * $r) / $n) + (($z * $z) / (4 * ($n * $n))))))) / (1 + (($z * $z) / $n));
        $rumus = round($rumus, 4);
        return $rumus;
    }

    // looping perhitungan Pessimistic error rate
    public function loopingPerhitunganPrePruning($positif, $negatif)
    {
        $z = 1.645; // z = batas kepercayaan (confidence treshold)
        $n = $positif + $negatif; // n = total jml kasus
        $n = round($n, 4);
        // r = perbandingan child thd parent
        if ($positif < $negatif) {
            $r = $positif / ($n);
            $r = round($r, 4);
            return $this->perhitunganPrePruning($r, $z, $n);
        } elseif ($positif > $negatif) {
            $r = $negatif / ($n);
            $r = round($r, 4);
            return $this->perhitunganPrePruning($r, $z, $n);
        }
        elseif ($positif == $negatif) {
            if ($positif == 0 && $negatif == 0) {
                return 0;
            } else {
                $r = $negatif / ($n);
                $r = round($r, 4);
                return $this->perhitunganPrePruning($r, $z, $n);
            }
        }
    }

    // replace keputusan jika ada keputusan yg Null
    public function replaceNull()
    {
        $sqlReplaceNull = DB::table('pohon_keputusan_c45')->select('id', 'id_parent')->where('keputusan', 'Null')->get();

        foreach ($sqlReplaceNull as $rowReplaceNull) {
            $rowReplaceNullIdParent = DB::table('pohon_keputusan_c45')->select('jml_aktif', 'jml_tdk_aktif','keputusan')->where('id', $rowReplaceNull->id_parent)->first();

            if ($rowReplaceNullIdParent->jml_aktif > $rowReplaceNullIdParent->jml_tdk_aktif) {
                $keputusanNull = 'Aktif'; // jika jml_aktif != 0 dan jml_tdk_aktif = 0, maka keputusan Layak
            } else if ($rowReplaceNullIdParent->jml_aktif < $rowReplaceNullIdParent->jml_tdk_aktif) {
                $keputusanNull = 'Tidak Aktif'; // jika jml_aktif = 0 dan jml_tdk_aktif != 0, maka keputusan Tidak Layak
            }
            DB::table('pohon_keputusan_c45')->where('id', $rowReplaceNull->id)->update(['keputusan' => $keputusanNull]);
        }
    }
}
