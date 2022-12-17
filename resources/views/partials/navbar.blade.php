<input type="checkbox" id="check">
    
    
    <!-- Sidebar -->    
    <div class="sidebar" id="sidebar">
    
      <div class="head-sidebar">
        <div>
          <a href="#" class="logo-btn"><img src="img/Logo_swi.png" alt="" class="logo color-light"><span>SWIFECT | ERP APPS</span></img></a>
        </div>
        <label for="check">
          <i class="fas fa-bars" id="sidebar_toggle"></i>
        </label>
      </div>      
      <center class="profile_form">
        {{-- <img src="/img/quavo.jpg" alt="" class="profile_img"></img> --}}
        <h4>PT.ABC MANTAP</h4>
      </center>
      <a href="{{ '/pemasukan' }}" class="btn_Nav {{ 'pemasukan' == request()->path() ? 'btn_NavActive' : '' }}"><i class="fas fa-edit"></i><span>Pemasukan</span></a>
      <a href="{{ '/pengeluaran' }}" class="btn_Nav {{ 'pengeluaran' == request()->path() ? 'btn_NavActive' : '' }}"><i class="fas fa-edit"></i><span>Pengeluaran</span></a>
      {{-- <a href="{{ 'home' }}" class="btn_Nav {{ 'home' == request()->path() ? 'btn_NavActive' : '' }}"><i class="fas fa-home"></i><span>Home</span></a>
      <a href="{{ '/inputdata' }}" class="btn_Nav {{ 'inputdata' == request()->path() ? 'btn_NavActive' : '' }}"><i class="fas fa-edit"></i><span>Input Data (MD5)</span></a>
      <a href="{{ '/datamd5' }}" class="btn_Nav {{ 'datamd5' == request()->path() ? 'btn_NavActive' : '' }}"><i class="fas fa-file-alt"></i><span>Data Karyawan (MD5)</span></a>
      <hr>
      <a href="{{ '/inputdatatrd' }}" class="btn_Nav {{ 'inputdatatrd' == request()->path() ? 'btn_NavActive' : '' }}"><i class="fas fa-edit"></i><span>Input Data (TripDES)</span></a>
      <a href="{{ 'datatrd' }}" class="btn_Nav {{ 'datatrd' == request()->path() ? 'btn_NavActive' : '' }}"><i class="fas fa-file-alt"></i><span>Data Karyawan (TripDES)</span></a>
      <hr>
      <a href="{{ '/datamd5' }}" class="btn_Nav {{ 'datamd5' == request()->path() ? 'btn_NavActive' : '' }}"><i class="fas fa-file-alt"></i><span>Pemasukan List</span></a>
      <hr>
      <a href="{{ '/inputdatatrdrbw' }}" class="btn_Nav {{ 'inputdatatrdrbw' == request()->path() ? 'btn_NavActive' : '' }}"><i class="fas fa-edit"></i><span>Input Data (TripDES Rainbow)</span></a>
      <a href="{{ 'datatrdrbw' }}" class="btn_Nav {{ 'datatrdrbw' == request()->path() ? 'btn_NavActive' : '' }}"><i class="fas fa-file-alt"></i><span>Data Karyawan (TripDES Rainbow)</span></a> --}}
    </div>
    <!-- END Sidebar -->