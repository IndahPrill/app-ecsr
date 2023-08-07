<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mining_c45 extends Model
{
    use HasFactory;

    public $timestamps = true;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mining_c45';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'atribut',
        'nilai_atribut',
        'jml_kasus_total',
        'jml_aktif',
        'jml_tdk_aktif',
        'entropy',
        'inf_gain',
        'inf_gain_temp',
        'split_info',
        'split_info_temp',
        'gain_ratio'
    ];
}
