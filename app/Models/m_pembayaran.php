<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_pembayaran extends Model
{
    use HasFactory;

    public $timestamps = true;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'm_pembayaran';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code_mb',
        'tgl_bayar',
        'tgl_jth_tmpo',
        'kesanggupan',
        'jumlah',
        'rencana',
        'angsuran',
        'angsuran_berjalan',
        'tunggakan'
    ];
}
