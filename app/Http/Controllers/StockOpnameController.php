<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class StockOpnameController extends Controller
{
    public function index(){
        $pemasukans = Pemasukan::where('stats','=',1)->paginate(10);
        $pengeluarans = Pengeluaran::where('stats','=',1)->paginate(10);
        return view('pages.stockopname',[
            'pemasukans' => $pemasukans,
            'pengeluarans' => $pengeluarans
        ]);
    }
}
