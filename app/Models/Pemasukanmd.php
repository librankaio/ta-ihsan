<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukanmd extends Model
{
    use HasFactory;

    protected $fillable = [
        'notrans',
        'npwp',
        'supplier',
        'stats',
    ];
}
