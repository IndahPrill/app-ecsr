<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_informasi extends Model
{
    use HasFactory;

    public $timestamps = true;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'm_informasi';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'kode_kegiatan',
        'nama_kegiatan',
        'tempat_lahir',
        'tgl_kegiatan',
        'kebangsaan',
        'kategori_usaha',
        'produk_usaha',
        'deskripsi_usaha',
    ];
}
