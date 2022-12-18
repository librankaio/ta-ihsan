<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stockopname extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_brg',
        'jenis_brg',
        'jml_brg',
        'supplier',
        'harga_brg',
        'stats',
    ];
}
