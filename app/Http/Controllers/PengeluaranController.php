<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\Pengeluaranmd;
use App\Models\Stockopname;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index(){
        $pengeluarans = Pengeluaran::where('stats','=',1)->paginate(10);
        $pemasukans = Pemasukan::where('stats','=',1)->get();
        return view('pages.pengeluaran',[
            'pengeluarans' => $pengeluarans,
            'pemasukans' => $pemasukans,
        ]);
    }

    public function post(Request $request){
        // dd($request->all());
        $start = microtime(true);
        $request->validate([
            'notrans' => ['required', 'string'],
            'nama_brg' => ['required', 'string'],
            'jenis_brg' => ['required', 'string'],
            'jml_barang' => ['required', 'integer'],
            'customer' => ['required', 'string'],
            'hrg_barang' => ['required', 'integer'],
            'stats' => ['required', 'boolean']
        ]);        

        Pengeluaran::create([
            'notrans' => MdEncryptController::md5Encrypt($request->notrans),
            'nama_brg' => $request->nama_brg,
            'jenis_brg' => $request->jenis_brg,
            'jml_brg' => $request->jml_barang,
            'customer' => MdEncryptController::md5Encrypt($request->customer),
            'harga_brg' => $request->hrg_barang,
            'stats' => $request->stats,
        ]);
        Pengeluaranmd::create([
            'notrans' => $request->notrans,
            'customer' => $request->customer,
            'stats' => $request->stats
        ]);
        //Update Pemasukan
        $pemasukan = Pemasukan::select('jml_brg','supplier')->where('stats','=',1)->where('nama_brg','=',$request->nama_brg)->first();
        $stock = $pemasukan->jml_brg - $request->jml_barang;
        Pemasukan::where('stats','=',1)->where('nama_brg','=',$request->nama_brg)->update(['jml_brg' => $stock]);
        
        //FIND SUPPLIER
        $supplier = PemasukanController::md5Decrypt('supplier',$pemasukan->supplier);
        
        $validateitem = Stockopname::where('stats','=',1)->where('nama_brg','=',$request->nama_brg)->first();
        if($validateitem == null){
            Stockopname::create([
                'nama_brg' => $request->nama_brg,
                'jenis_brg' => $request->jenis_brg,
                'jml_brg' => $stock,
                'supplier' => $supplier,
                'harga_brg' => $request->hrg_barang,
                'stats' => $request->stats,
            ]);
        }else{
            $stockopname = Stockopname::select('jml_brg')->where('stats','=',1)->where('nama_brg','=',$request->nama_brg)->first();
            $jmlbrg = $stockopname->jml_brg - $request->jml_barang;
            Stockopname::where('stats','=',1)->where('nama_brg','=',$request->nama_brg)->update(['jml_brg' => $jmlbrg]);
        }
        $end = microtime(true);
        // echo round($end-$start,5)." MiliSeconds";
        $waktu =  round($end-$start,5)." MiliSeconds";
        return redirect('pengeluaran')->with('success','Data Berhasil Di Inputkan selama',$waktu);
    }

    public static function md5Encrypt($str){
        $hash = md5( $str );
        return $hash;
    }

    public function edit(Pengeluaran $pengeluaran){

        return view('pages.pemasukanedit',[ 'pengeluaran' => $pengeluaran]);

    }

    public function update(Pengeluaran $pengeluaran){
        // dd(request()->all());
        request()->validate([
            'notrans' => 'required',
            'nama_brg' => 'required',
            'jenis_brg' => 'required',
            'jml_barang' => 'required',
            'customer' => 'required',
            'hrg_barang' => 'required',
            'stats' => 'required',
        ]);

        $notrans = request('notrans');
        $customer = request('customer');

        $pengeluaran->update([
            'notrans' => MdEncryptController::md5Encrypt($notrans),
            'nama_brg' => request('nama_brg'),
            'jenis_brg' => request('jenis_brg'),
            'jml_brg' => request('jml_barang'),
            'customer' => MdEncryptController::md5Encrypt($customer),
            'harga_brg' => request('hrg_barang'),
            'stats' => request('stats'),
        ]);
        return redirect('pemasukan')->with('success','Data Berhasil Di Update');

    }

    public static function md5Decrypt($var,$str){
        $start = microtime(true);
        $hash = $str;
        $decrypts = Pengeluaranmd::select( $var )->where('stats','=',1)->Get();
        foreach($decrypts as $decrypt){
            $decrypt[$var];

            if (md5($decrypt[$var]) == $hash){
                return $decrypt[$var];
            }else{
                // echo 'Failure';
            }
            
        }
        $end = microtime(true); 
        $final = round($end-$start,2)."Seconds";
        echo $final;
    }

    public function delete(Pengeluaran $pengeluaran){
        $pengeluaran->update([
            'stats' => 0
        ]);
        return redirect('pemasukan')->with('success','Data Berhasil Di Delete');

    }
}
