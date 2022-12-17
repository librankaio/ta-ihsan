@extends('layouts.main')
@section('content')

{{-- Title Form --}}
<div class="container-fluid px-4 py-2">
    <div class="px-3 bg-white">
        <h5 class="py-2 text-decoration-underline" style="color: #00235D">Stock Opname</h5>
    </div>
</div>
{{-- END Title Form --}}
<div class="container-fluid px-4 py-2">
    @include('layouts.flash-message')
</div>
{{-- Form --}}
<form action="{{ 'pemasukanpost' }}" method="post" class="container-fluid px-5 py-2">
        <div class="row">
            <div class="container col-md-12 bg-white ps-4 pe-3 py-4" style="border-radius: 10px;">
                <div class="nav-table py-2 px-1">
                    <div class="row d-flex">
                        <div class="col-md-6"></div>
                        <div class="col-md-2"></div>
                        {{-- <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-6 text-end">
                                    <label for="exampleInputEmail1" class="form-label py-2">Search :</label>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="col-md-2">
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Search Nomor Pendaftaran...">
                        </div> --}}
                    </div>
                </div>
                <table class="table table-striped table-hover">

                    <thead>
                        <tr align="center" class="" style="font-weight: bold;">
                            <th scope="col" class="border-bottom-0 border-2">No</th>
                            <th scope="col" class="border-bottom-0 border-2">No Transaksis</th>
                            <th scope="col" class="border-bottom-0 border-2">Nama Barang</th>
                            <th scope="col" class="border-bottom-0 border-2">Jenis Barang</th>
                            <th scope="col" class="border-bottom-0 border-2">Nama Supplier</th>
                            <th scope="col" class="border-bottom-0 border-2">Jumlah Barang Masuk</th>
                            <th scope="col" class="border-bottom-0 border-2">Jumlah Barang Keluar</th>
                            <th scope="col" class="border-bottom-0 border-2">Jumlah Stock Barang</th>
                            <th scope="col" class="border-bottom-0 border-2">Harga Barang</th>
                            <th align="center" colspan="2" class="border-bottom-0 border-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $start = microtime(true); @endphp
                        @php $no=0; @endphp
                        @foreach ($pemasukans as $pemasukan)
                        @foreach ($pengeluarans as $pengeluaran)
                        @php $no++ @endphp
                        <tr>
                            test
                            <th scope="row" class="border-2">{{ $no }}</th>
                            <td class="border-2">{{ App\Http\Controllers\PemasukanController::md5Decrypt('notrans',$pemasukan['notrans']) }}</td>
                            <td class="border-2">{{ $pemasukan->nama_brg }}</td>
                            <td class="border-2">{{ $pemasukan->jenis_brg }}</td>
                            <td class="border-2">{{ App\Http\Controllers\PemasukanController::md5Decrypt('supplier',$pemasukan['supplier']) }}</td>
                            <td class="border-2">{{ $pemasukan->jml_brg }}</td>
                            <td class="border-2">{{ $pengeluaran->jml_brg }}</td>
                            <td class="border-2">{{ $pemasukan->jml_brg - $pengeluaran->jml_brg}}</td>
                            <td class="border-2">{{ $pemasukan->harga_brg}}</td>
                            <td class="border-2"><a href="/pemasukan/{{ $pemasukan->id }}/edit"><i class="far fa-edit"></i></a></td>
                            <td class="border-2"><a href="/pemasukan/{{ $pemasukan->id }}/delete"><i class="fas fa-trash-alt"></i></a></td>

                        </tr>
                        @endforeach
                        @endforeach
                        @php $end = microtime(true);
                        echo round($end-$start,5)."MiliSeconds";
                        @endphp
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-6 py-3">
                        <div class="d-flex justify-content-start">
                            Showing
                            {{ $pemasukans->firstItem() }}
                            to
                            {{ $pemasukans->lastItem() }}
                            of
                            {{ $pemasukans->total() }}
                            Entries
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            {{ $pemasukans->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>
{{-- END Form --}}
@endsection
