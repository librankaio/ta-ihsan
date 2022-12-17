@extends('layouts.main')
@section('content')

{{-- Title Form --}}
<div class="container-fluid px-4 py-2">
    <div class="px-3 bg-white"><h5 class="py-2 text-decoration-underline" style="color: #00235D">MD5</h5></div>
</div>
{{-- END Title Form --}}
<div class="container-fluid px-4 py-2">
    @include('layouts.flash-message')
</div>
{{-- Form --}}
<form action="/inputdatamd5/{{ $karyawan->id }}" method="post" class="container-fluid px-5 py-2">
    @method('PUT')
    @csrf
    <div class="head-form">
        <div class="row">                
                <div class="container col-md-4 bg-white px-4 pt-4 pb-4"
                style="border-top-left-radius: 10px;">
                {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"/> --}}
                {{-- <input type="hidden" name="stats" value="{{ 1 }}"/> --}}
                <div class="row">              
                    <div class="col-md-12 bg-white">
                    <div class="">                
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $karyawan->nama }}" aria-describedby="emailHelp">
                    </div>              
                    </div>
                </div>    
                </div>        
                <div class="container col-md-4 bg-white px-4 pt-4 pb-4" style="border-top-right-radius: 10px;">
                <div class="row">
                    <div class="col-md-12 bg-white">
                    <div class="">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="{{ App\Http\Controllers\InputDataController::md5DecryptEdit('nik',$karyawan->nik,$karyawan->id) }}" aria-describedby="emailHelp">
                    </div> 
                    </div>
                </div>
                </div>
                <div class="container col-md-4 px-4 pb-4"></div>
                <div class="container col-md-4 bg-white px-4 pb-4">
                    <div class="row">              
                        <div class="col-md-12 bg-white">
                        <div class="">                
                            <label for="npwp" class="form-label">NPWP</label>
                            <input type="text" class="form-control" id="npwp" name="npwp" value="{{ App\Http\Controllers\InputDataController::md5DecryptEdit('npwp',$karyawan->npwp,$karyawan->id) }}" aria-describedby="emailHelp">
                        </div>              
                        </div>
                    </div>  
                </div>
                <div class="container col-md-4 bg-white px-4">
                    <div class="row">              
                        <div class="col-md-12 bg-white">
                        <div class="">                
                            <label for="exampleInputEmail1" class="form-label">Jabatan</label>
                            <select class="form-select" aria-label="Default select example" name="jbtn" value="">
                                @if ($karyawan->jbtn == 1)
                                <option selected value="1">B1</option>
                                <option value="2">B2</option>
                                <option value="3">ASN</option>
                                <option value="4">Non ASN</option>
                                @elseif ($karyawan->jbtn == 2)
                                <option value="1">B1</option>
                                <option selected value="2">B2</option>
                                <option value="3">ASN</option>
                                <option value="4">Non ASN</option>
                                @elseif ($karyawan->jbtn == 3)
                                <option value="1">B1</option>
                                <option value="2">B2</option>
                                <option selected value="3">ASN</option>
                                <option value="4">Non ASN</option>
                                @elseif ($karyawan->jbtn == 4)
                                <option value="1">B1</option>
                                <option value="2">B2</option>
                                <option value="3">ASN</option>
                                <option selected value="4">Non ASN</option>
                                @endif
                            </select>
                        </div>              
                        </div>
                    </div>  
                </div>
                <div class="container col-md-4 px-4 py-4"></div>
                <div class="container col-md-4 bg-white px-4 pb-4">
                    <div class="row">              
                        <div class="col-md-12 bg-white">
                        <div class="">                
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea type="text" class="form-control" id="alamat" name="alamat" value="" aria-describedby="emailHelp" style="resize: none; height:8vh;">{{ App\Http\Controllers\InputDataController::md5DecryptEdit('alamat',$karyawan->alamat,$karyawan->id) }}</textarea>
                        </div>              
                        </div>
                    </div>  
                </div>
                <div class="container col-md-4 bg-white px-4">
                    <div class="row">              
                        <div class="col-md-12 bg-white">
                        <div class="">                
                            <label for="exampleInputEmail1" class="form-label">Jumlah Tanggungan</label>
                            <select class="form-select" aria-label="Default select example" name="tgngn" value="">
                            @if ($karyawan->tgngn == 1)
                            <option selected value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            @elseif ($karyawan->tgngn == 2)
                            <option value="1">1</option>
                            <option selected value="2">2</option>
                            <option value="3">3</option>
                            @elseif ($karyawan->tgngn == 3)
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option selected value="3">3</option>
                            @endif
                            </select>
                        </div>              
                        </div>
                    </div>  
                </div>
                <div class="container col-md-4 px-4 py-4"></div>
                <div class="container col-md-4 bg-white px-4 pb-4"
                style="border-bottom-left-radius: 10px;">
                    <div class="row">              
                        <div class="col-md-12 bg-white">
                        <div class="">                
                            <label for="penghasilan" class="form-label">Penghasilan</label>
                            <input type="text" class="form-control" id="penghasilan" name="penghasilan" value="{{ $karyawan->penghasilan }}" aria-describedby="emailHelp">
                        </div>              
                        </div>
                    </div>  
                </div>
                <div class="container col-md-4 bg-white px-4" style="border-bottom-right-radius: 10px;">
                    <div class="row">              
                        <div class="col-md-12 bg-white">
                        <div class="">                
                            <label for="pajakhasil" class="form-label">Pajak Penghasilan</label>
                            <input type="text" class="form-control" id="pajakhasil" name="pajakhasil" value="{{ $karyawan->pajakhasil }}" aria-describedby="emailHelp">
                            <div class="btn-form text-end py-4">
                                <button type="submit" class="btn btn-primary"><span>Submit</span></button>
                            </div>
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