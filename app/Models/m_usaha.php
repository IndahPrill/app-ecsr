<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_usaha extends Model
{
    use HasFactory;

    public $timestamps = true;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'm_usaha';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code_mb',
        'kd_usaha',
        'nama',
        'npwp',
        'tahun',
        'alamat',
        'sektor',
        'produk',
        'kap_produksi',
        'ssr_usaha',
        'jml_modal',
        'asal_modal',
        'jml_aset',
        'jml_omzet',
        'laba_bersih',
        'jml_pekerja',
        'riwayat',
        'rencana',
        'alasan',
        'kebutuhan',
        'penggunaan',
        'kesanggupan'
    ];
}
