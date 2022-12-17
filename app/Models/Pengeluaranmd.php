<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaranmd extends Model
{
    use HasFactory;

    protected $fillable = [
        'notrans',
        'npwp',
        'customer',
        'stats',
    ];
}
