@extends('layouts.main')
@section('content')

{{-- Title Form --}}
<div class="container-fluid px-4 py-2">
    <div class="px-3 bg-white">
        <h5 class="py-2 text-decoration-underline" style="color: #00235D">Input Barang Keluar</h5>
    </div>
</div>
{{-- END Title Form --}}
<div class="container-fluid px-4 py-2">
    @include('layouts.flash-message')
</div>
{{-- Form --}}
<form action="{{ 'pengeluaranpost' }}" method="post" class="container-fluid px-5 py-2">
    <div class="head-form">
        <div class="row pb-3">
            <div class="container col-md-4 bg-white px-4 pt-4 pb-4" style="border-top-left-radius: 10px;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="stats" value="{{ 1 }}" />
                <div class="row">
                    <div class="col-md-12 bg-white">
                        <div class="">
                            <label for="notrans" class="form-label">No Transaksi</label>
                            <input type="text" class="form-control" id="notrans" name="notrans" value="{{ old('notrans') }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container col-md-4 bg-white px-4 pt-4 pb-4" style="border-top-right-radius: 10px;">
                <div class="row">
                    <div class="col-md-12 bg-white">
                        <div class="">
                            <label for="nama_brg" class="form-label">Nama Barang</label>
                            {{-- <input type="text" class="form-control" id="nama_brg" name="nama_brg" value="{{ old('nama_brg') }}"> --}}
                            <select class="form-select" aria-label="Default select example" name="nama_brg" value="{{ old('nama_brg') }}">
                                <option selected>--PILIH DATA--</option>
                                @foreach($pemasukans as $key => $pemasukan)
                                <option>{{ $pemasukan->nama_brg }}</option>                           
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container col-md-4 px-4 pb-4"></div>
            <div class="container col-md-4 bg-white px-4 pb-4">
                <div class="row">
                    <div class="col-md-12 bg-white">
                        <div class="">
                            <label for="jenis_brg" class="form-label">Jenis Barang</label>
                            <select class="form-select" aria-label="Default select example" name="jenis_brg" value="{{ old('jenis_brg') }}">
                                <option selected>--PILIH DATA--</option>
                                <option>Bahan Baku</option>
                                <option>Barang Jadi</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container col-md-4 bg-white px-4">
                <div class="row">
                    <div class="col-md-12 bg-white">
                        <div class="">
                            <label for="jml_barang" class="form-label">Jumlah barang</label>
                            <input type="number" class="form-control" id="jml_barang" name="jml_barang" value="{{ old('jml_barang') }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container col-md-4 px-4 py-4"></div>
            <div class="container col-md-4 bg-white px-4 pb-4">
                <div class="row">
                    <div class="col-md-12 bg-white">
                        <div class="">
                            <label for="customer" class="form-label">Nama Customer</label>
                            <input type="text" class="form-control" id="customer" name="customer" value="{{ old('customer') }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container col-md-4 bg-white px-4 pb-4">
                <div class="row">
                    <div class="col-md-12 bg-white">
                        <div class="">
                            <label for="hrg_barang" class="form-label">Harga Barang</label>
                            <input type="number" class="form-control" id="hrg_barang" name="hrg_barang" value="{{ old('hrg_barang') }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container col-md-4 px-4 pb-4" style="border-bottom-left-radius: 10px;">

            </div>
            <div class="container col-md-4 bg-white px-4" style="border-bottom-left-radius: 10px;">
            </div>
            <div class="container col-md-4 bg-white px-4" style="border-bottom-right-radius: 10px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-form text-end py-4">
                            <button type="submit" class="btn btn-primary"><span>Submit</span></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container col-md-4 px-4 py-4"></div>
        </div>
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
                            <th scope="col" class="border-bottom-0 border-2">No Transaksi</th>
                            <th scope="col" class="border-bottom-0 border-2">Nama Barang</th>
                            <th scope="col" class="border-bottom-0 border-2">Jenis Barang</th>
                            <th scope="col" class="border-bottom-0 border-2">Nama Supplier</th>
                            <th scope="col" class="border-bottom-0 border-2">Jumlah Barang</th>
                            <th scope="col" class="border-bottom-0 border-2">Harga Barang</th>
                            <th align="center" colspan="2" class="border-bottom-0 border-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $start = microtime(true); @endphp
                        @php $no=0; @endphp
                        @foreach ($pengeluarans as $pengeluaran)
                        @php $no++ @endphp
                        <tr>
                            <th scope="row" class="border-2">{{ $no }}</th>
                            <td class="border-2">{{ App\Http\Controllers\PengeluaranController::md5Decrypt('notrans',$pengeluaran['notrans']) }}</td>
                            <td class="border-2">{{ $pengeluaran->nama_brg }}</td>
                            <td class="border-2">{{ $pengeluaran->jenis_brg }}</td>
                            <td class="border-2">{{ $pengeluaran->jml_brg }}</td>
                            <td class="border-2">{{ App\Http\Controllers\PengeluaranController::md5Decrypt('customer',$pengeluaran['customer']) }}</td>
                            <td class="border-2">{{ $pengeluaran->harga_brg }}</td>
                            <td class="border-2"><a href="/pemasukan/{{ $pengeluaran->id }}/edit"><i class="far fa-edit"></i></a></td>
                            <td class="border-2"><a href="/pemasukan/{{ $pengeluaran->id }}/delete"><i class="fas fa-trash-alt"></i></a></td>

                        </tr>
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
                            {{ $pengeluarans->firstItem() }}
                            to
                            {{ $pengeluarans->lastItem() }}
                            of
                            {{ $pengeluarans->total() }}
                            Entries
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            {{ $pengeluarans->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>
{{-- END Form --}}
@endsection
