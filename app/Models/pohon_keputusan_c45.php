<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pohon_keputusan_c45 extends Model
{
    use HasFactory;

    public $timestamps = true;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pohon_keputusan_c45';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'atribut',
        'nilai_atribut',
        'id_parent',
        'jml_aktif',
        'jml_tdk_aktif',
        'keputusan',
        'diproses',
        'kondisi_atribut',
        'looping_kondisi'
    ];
}
