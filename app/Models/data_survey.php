<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_survey extends Model
{
    use HasFactory;

    public $timestamps = true;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'data_survey';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'alamat',
        'wilayah',
        'tgl_lahir',
        'tahun',
        'angsuran',
        'status_klasifikasi',
        'jenis_usaha',
        'status_usaha'
    ];
}
