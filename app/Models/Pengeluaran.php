<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'notrans',
        'nama_brg',
        'jenis_brg',
        'jml_brg',
        'customer',
        'harga_brg',
        'stats',
    ];
}
