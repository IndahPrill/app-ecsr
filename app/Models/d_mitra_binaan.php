<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class d_mitra_binaan extends Model
{
    use HasFactory;

    public $timestamps = true;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'm_mitra_binaan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [];
}
