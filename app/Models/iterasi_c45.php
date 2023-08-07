<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class iterasi_c45 extends Model
{
    use HasFactory;

    public $timestamps = true;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'iterasi_c45';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'iterasi',
        'atribut_gain_ratio_max',
        'atribut',
        'nilai_atribut',
        'jml_kasus_total',
        'jml_aktif',
        'jml_tdk_aktif',
        'entropy',
        'inf_gain',
        'split_info',
        'gain_ratio'
    ];
}
