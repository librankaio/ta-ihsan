<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawanrnbw extends Model
{
    use HasFactory;
    protected $fillable = [
        'nik',
        'npwp',
        'alamat',
        'stats',
    ];
}
