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
                            <th scope="col" class="border-bottom-0 border-2">Nama Barang</th>
                            <th scope="col" class="border-bottom-0 border-2">Jenis Barang</th>
                            <th scope="col" class="border-bottom-0 border-2">Nama Supplier</th>
                            <th scope="col" class="border-bottom-0 border-2">Jumlah Stock Barang</th>
                            <th scope="col" class="border-bottom-0 border-2">Harga Barang</th>
                            <th align="center" colspan="2" class="border-bottom-0 border-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>                        
                        @php $start = microtime(true); @endphp
                        @php $no=0; @endphp
                        @php $earlycount = 0; @endphp
                        @foreach ($stockopnames as $stockopname)
                        @php $no++ @endphp
                        <tr>
                            <th scope="row" class="border-2">{{ $no }}</th>
                            <td class="border-2">{{ $stockopname->nama_brg }}</td>
                            <td class="border-2">{{ $stockopname->jenis_brg }}</td>
                            <td class="border-2">{{ $stockopname->supplier }}</td>
                            <td class="border-2">{{ $stockopname->jml_brg }}</td>
                            <td class="border-2">{{ $stockopname->harga_brg}}</td>
                            <td class="border-2"><a href="/pemasukan/{{ $stockopname->id }}/edit"><i class="far fa-edit"></i></a></td>
                            <td class="border-2"><a href="/pemasukan/{{ $stockopname->id }}/delete"><i class="fas fa-trash-alt"></i></a></td>

                        </tr>
                        @if( $stockopname->jml_brg < 5)
                            @php $earlycount++ @endphp
                        @endif
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
                            {{ $stockopnames->firstItem() }}
                            to
                            {{ $stockopnames->lastItem() }}
                            of
                            {{ $stockopnames->total() }}
                            Entries
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            {{ $stockopnames->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- EARLY WARNING --}}
        @if($earlycount > 0)
        <div class="container-fluid px-4 py-2">
            <div class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">??</button>    
                <strong>Warning!! ada ({{ $earlycount }}) data barang yang kurang dari 5</strong>
            </div>
        </div>
        @endif
</form>
{{-- END Form --}}
@endsection
