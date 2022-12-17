<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawanrbw extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nik',
        'npwp',
        'jbtn',
        'alamat',
        'tgngn',
        'penghasilan',
        'pajakhasil',
        'stats',
    ];
}
