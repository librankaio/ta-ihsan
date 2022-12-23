<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pemasukanmd;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    public function index(){
        $pemasukans = Pemasukan::where('stats','=',1)->paginate(10);
        return view('pages.pemasukan',[
            'pemasukans' => $pemasukans
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
            'supplier' => ['required', 'string'],
            'hrg_barang' => ['required', 'integer'],
            'stats' => ['required', 'boolean']
        ]);

        Pemasukan::create([
            'notrans' => MdEncryptController::md5Encrypt($request->notrans),
            'nama_brg' => $request->nama_brg,
            'jenis_brg' => $request->jenis_brg,
            'jml_brg' => $request->jml_barang,
            'supplier' => MdEncryptController::md5Encrypt($request->supplier),
            'harga_brg' => $request->hrg_barang,
            'stats' => $request->stats,
        ]);
        Pemasukanmd::create([
            'notrans' => $request->notrans,
            'supplier' => $request->supplier,
            'stats' => $request->stats
        ]);
        $end = microtime(true);
        // echo round($end-$start,5)." MiliSeconds";
        $waktu =  round($end-$start,5)." MiliSeconds";
        return redirect('pemasukan')->with('success','Data Berhasil Di Inputkan selama '.$waktu);
    }

    public static function md5Encrypt($str){
        $hash = md5( $str );
        return $hash;
    }

    public function edit(Pemasukan $pemasukan){

        return view('pages.pemasukanedit',[ 'pemasukan' => $pemasukan]);

    }

    public function update(Pemasukan $pemasukan){
        // dd(request()->all());
        request()->validate([
            'notrans' => 'required',
            'nama_brg' => 'required',
            'jenis_brg' => 'required',
            'jml_barang' => 'required',
            'supplier' => 'required',
            'hrg_barang' => 'required',
            'stats' => 'required',
        ]);

        $notrans = request('notrans');
        $supplier = request('supplier');

        $pemasukan->update([
            'notrans' => MdEncryptController::md5Encrypt($notrans),
            'nama_brg' => request('nama_brg'),
            'jenis_brg' => request('jenis_brg'),
            'jml_brg' => request('jml_barang'),
            'supplier' => MdEncryptController::md5Encrypt($supplier),
            'harga_brg' => request('hrg_barang'),
            'stats' => request('stats'),
        ]);
        return redirect('pemasukan')->with('success','Data Berhasil Di Update');

    }

    public static function md5Decrypt($var,$str){
        $start = microtime(true);
        $hash = $str;
        $decrypts = Pemasukanmd::select( $var )->where('stats','=',1)->Get();
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

    public function delete(Pemasukan $pemasukan){
        $pemasukan->update([
            'stats' => 0
        ]);
        return redirect('pemasukan')->with('success','Data Berhasil Di Delete');

    }
}
