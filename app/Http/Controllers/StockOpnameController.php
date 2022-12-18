<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\Stockopname;
use Illuminate\Http\Request;

class StockOpnameController extends Controller
{
    public function index(){
        $stockopnames = Stockopname::where('stats','=',1)->paginate(10);
        $stock_count = Stockopname::where('stats','=',1)->get();
        $stocks = 0;
        foreach ($stock_count as $count){
            if($count->jml_brg >= 5){
                $stocks++;
            }
        }
        // dd($stocks);
        return view('pages.stockopname',[
            'stockopnames' => $stockopnames
        ]);
    }
}
