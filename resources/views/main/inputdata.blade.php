@extends('layouts.main')
@section('content')

{{-- Title Form --}}
<div class="container-fluid px-4 py-2">
    <div class="px-3 bg-white"><h5 class="py-2 text-decoration-underline" style="color: #00235D">Input Barang Masuk</h5></div>
</div>
{{-- END Title Form --}}
<div class="container-fluid px-4 py-2">
    @include('layouts.flash-message')
</div>
{{-- Form --}}
<form action="{{ 'inputdatamd5' }}" method="post" class="container-fluid px-5 py-2">
    <div class="head-form">
        <div class="row">                
                <div class="container col-md-4 bg-white px-4 pt-4 pb-4"
                style="border-top-left-radius: 10px;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="stats" value="{{ 1 }}"/>
                <div class="row">
                    <div class="col-md-12 bg-white">
                    <div class="">
                        <label for="notrans" class="form-label">No Transaksi</label>
                        <input type="text" class="form-control" id="notrans" name="notrans" value="{{ old('notrans') }}" aria-describedby="emailHelp">
                    </div> 
                    </div>
                </div>
                </div>        
                <div class="container col-md-4 bg-white px-4 pt-4 pb-4" style="border-top-right-radius: 10px;">                
                <div class="row">              
                    <div class="col-md-12 bg-white">
                    <div class="">                
                        <label for="nama_brg" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_brg" name="nama_brg" value="{{ old('nama_brg') }}" aria-describedby="emailHelp">
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
                            <input type="text" class="form-control" id="jml_barang" name="jml_barang" value="{{ old('jml_barang') }}" aria-describedby="emailHelp">
                        </div>              
                        </div>
                    </div>  
                </div>
                <div class="container col-md-4 px-4 py-4"></div>
                <div class="container col-md-4 bg-white px-4 pb-4">
                    <div class="row">              
                        <div class="col-md-12 bg-white">
                        <div class="">                
                            <label for="supplier" class="form-label">Nama Supplier</label>
                            <input type="text" class="form-control" id="supplier" name="supplier" value="{{ old('supplier') }}" aria-describedby="emailHelp">
                        </div>              
                        </div>
                    </div>  
                </div>
                <div class="container col-md-4 bg-white px-4 pb-4">
                    <div class="row">              
                        <div class="col-md-12 bg-white">
                        <div class="">                
                            <label for="hrg_barang" class="form-label">Harga Barang</label>
                            <input type="text" class="form-control" id="hrg_barang" name="hrg_barang" value="{{ old('hrg_barang') }}" aria-describedby="emailHelp">
                        </div>              
                        </div>
                    </div>
                </div>
                <div class="container col-md-4 px-4 pb-4"
                style="border-bottom-left-radius: 10px;">
                      
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
    </div>  
</form>
{{-- END Form --}}
@endsection