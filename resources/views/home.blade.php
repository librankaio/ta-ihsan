@extends('layouts.main')
@section('content')

{{-- Title Form --}}
<div class="container-fluid px-5 py-2">
    <div class="px-3 bg-white"><h5 class="py-2 text-decoration-underline" style="color: #00235D">Home</h5></div>
</div>
{{-- END Title Form --}}
<br>
<div class="container-fluid px-5 py-2">
    <div class="">
        <div class="row">
            <div class="col-md-4">
                <div class="text-center py-5 px-2 bg-white">
                    <a href="{{ 'inputdata' }}" class="text-decoration-none">
                        <i class="fas fa-edit fa-customize mb-4"></i>
                        <br>
                        <span class="fw-bolder" style="font-weight: bolder;">INPUT DATA KARYAWAN</span>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center py-5 px-2 bg-white">
                    <a href="" class="text-decoration-none">
                        <i class="far fa-file-alt fa-customize mb-4"></i>
                        <br>
                        <span class="fw-bolder" style="font-weight: bolder;">DATA KARYAWAN</span>
                    </a>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</div>

@endsection