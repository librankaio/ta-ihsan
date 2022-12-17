@extends('layouts.main')
@section('content')

<!-- Form -->
<form action="{{ 'datamd' }}" method="post" class="container-fluid px-5 py-2">
    <br>
    <div class="row">                
      <div class="container col-md-12 bg-white ps-4 pe-3 py-4" style="border-radius: 10px;">
        <div class="nav-table py-2 px-1">
          <div class="row d-flex">
            <div class="col-md-6"></div>
            <div class="col-md-2"></div>
            <div class="col-md-2">
              <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6 text-end">
                  <label for="exampleInputEmail1" class="form-label py-2">Search :</label>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Search Nomor Pendaftaran...">
            </div>
          </div>
        </div>
        <table class="table table-striped table-hover">
          
          <thead>
            <tr align="center" class="" style="font-weight: bold;">
              <th scope="col" class="border-bottom-0 border-2">No</th>
              <th scope="col" class="border-bottom-0 border-2">Nama</th>
              <th scope="col" class="border-bottom-0 border-2">NIK</th>
              <th scope="col" class="border-bottom-0 border-2">NPWP</th>
              <th scope="col" class="border-bottom-0 border-2">Jabatan</th>
              <th scope="col" class="border-bottom-0 border-2">Alamat</th>
              <th scope="col" class="border-bottom-0 border-2">Jumlah Tanggungan</th>
              <th scope="col" class="border-bottom-0 border-2">Penghasilan</th>
              <th scope="col" class="border-bottom-0 border-2">Pajak Penghasilan</th>
              <th align="center" colspan="2" class="border-bottom-0 border-2">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php $start = microtime(true); @endphp
            @php $no=0; @endphp        
                @foreach ($karyawans as $karyawan)  
                @php $no++ @endphp     
            <tr>
                 
                <th scope="row" class="border-2">{{ $no }}</th>
                {{-- <td class="border-2">{{ $karyawan['nama'] }}</td> --}}
                <td class="border-2">{{ $karyawan->nama }}</td>
                <td class="border-2">{{ App\Http\Controllers\InputDataController::md5Decrypt('nik',$karyawan['nik']) }}</td>
                <td class="border-2">{{ App\Http\Controllers\InputDataController::md5Decrypt('npwp',$karyawan['npwp']) }}</td>
                {{-- <td class="border-2">{{ $karyawan['jbtn'] }}</td> --}}
                <td class="border-2">{{ $karyawan->jbtn }}</td>
                <td class="border-2">{{ App\Http\Controllers\InputDataController::md5Decrypt('alamat',$karyawan['alamat']) }}</td>
                {{-- <td class="border-2">{{ $karyawan['tgngn'] }}</td> --}}
                <td class="border-2">{{ $karyawan->tgngn }}</td>
                {{-- <td class="border-2">{{ $karyawan['penghasilan'] }}</td> --}}
                <td class="border-2">{{ $karyawan->penghasilan }}</td>
                {{-- <td class="border-2">{{ $karyawan['pajakhasil'] }}</td> --}}
                <td class="border-2">{{ $karyawan->pajakhasil }}</td>
                <td class="border-2"><a href="inputdatamd5/{{ $karyawan->id }}/edit"><i class="far fa-edit"></i></a></td>
                <td class="border-2"><a href="/inputdatamd5/{{ $karyawan->id }}/delete"><i class="fas fa-trash-alt"></i></a></td>
                
            </tr>
            @endforeach
            @php $end = microtime(true); 
            echo round($end-$start,5)."MiliSeconds";
            @endphp
            {{-- <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td colspan="2">Larry the Bird</td>
              <td>@twitter</td>
            </tr> --}}
          </tbody>
        </table>
        <div class="row">
          <div class="col-md-6 py-3">
            <div class="d-flex justify-content-start">
              Showing
              {{ $karyawans->firstItem() }}
              to
              {{ $karyawans->lastItem() }}
              of
              {{ $karyawans->total() }}
              Entries
            </div>
          </div>
          <div class="col-md-6">
            <div class="d-flex justify-content-end">
              {{ $karyawans->links() }}
            </div>
          </div>
        </div>
      </div>        
      <!-- <div class="container col-md-2 bg-white ps-4 pe-4 py-4">.col</div> 
      <div class="container col-md-2 bg-white px-4 py-4">.col</div> -->
  </form>
  <!-- END Form -->

@endsection