<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_ahli_waris extends Model
{
    use HasFactory;

    public $timestamps = true;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'm_ahli_waris';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kd_usaha',
        'nama',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'hubungan',
        'no_tlp',
        'no_ktp'
    ];
}
