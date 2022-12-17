@extends('layouts.main')
@section('content')

{{-- Title Form --}}
<div class="container-fluid px-4 py-2">
    <div class="px-3 bg-white">
        <h5 class="py-2 text-decoration-underline" style="color: #00235D">Users</h5>
    </div>
</div>
{{-- END Title Form --}}
<div class="container-fluid px-4 py-2">
    @include('layouts.flash-message')
</div>
{{-- Form --}}
<form action="{{ 'userpost' }}" method="post" class="container-fluid px-5 py-2">
    <div class="head-form">
        <div class="row pb-3">
            <div class="container col-md-4 bg-white px-4 pt-4 pb-4" style="border-top-left-radius: 10px;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="stats" value="{{ 1 }}" />
                <div class="row">
                    <div class="col-md-12 bg-white">
                        <div class="">
                            <label for="notrans" class="form-label">Username</label>
                            <input type="text" class="form-control" placeholder="Username" name="username" required="required" id="username" value="{{ old('username') }}" autofocus>
                        </div>
                        @if ($errors->has('username'))
                            <span class="text-danger text-left">{{$errors->first('username') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="container col-md-4 bg-white px-4 pt-4 pb-4" style="border-top-right-radius: 10px;">
                <div class="row">
                    <div class="col-md-12 bg-white">
                        <div class="">
                            <label for="nama_brg" class="form-label">Email</label>
                            <input type="text" class="form-control" placeholder="Email" name="email" required="required" id="email" value="{{ old('email') }}" autofocus>
                        </div>
                        @if ($errors->has('email'))
                            <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="container col-md-4 px-4 pb-4">
            </div>
            <div class="container col-md-4 bg-white px-4">
                <div class="row">
                    <div class="col-md-12 bg-white">
                        <div class="">
                            <label for="jml_barang" class="form-label">Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" value="{{ old('password') }}" required="required">
                        </div>
                        @if ($errors->has('password'))
                            <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="container col-md-4 bg-white px-4 py-4"></div>
            <div class="container col-md-4 px-4 pb-4"></div>
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
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Search User">
                        </div> --}}
                    </div>
                </div>
                <table class="table table-striped table-hover">

                    <thead>
                        <tr align="center" class="" style="font-weight: bold;">
                            <th scope="col" class="border-bottom-0 border-2">No</th>
                            <th scope="col" class="border-bottom-0 border-2">Username</th>
                            <th scope="col" class="border-bottom-0 border-2">Email</th>
                            <th align="center" colspan="2" class="border-bottom-0 border-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $start = microtime(true); @endphp
                        @php $no=0; @endphp
                        @foreach ($users as $user)
                        @php $no++ @endphp
                        <tr>
                            <th scope="row" class="border-2">{{ $no }}</th>
                            <td class="border-2">{{ $user->username }}</td>
                            <td class="border-2">{{ $user->email }}</td>
                            <td class="border-2"><a href="/user/{{ $user->id }}/edit"><i class="far fa-edit" disabled></i></a></td>
                            <td class="border-2"><a href="/user/{{ $user->id }}/delete"><i class="fas fa-trash-alt" disabled></i></a></td>
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
                            {{-- {{ $pemasukans->firstItem() }}
                            to
                            {{ $pemasukans->lastItem() }}
                            of
                            {{ $pemasukans->total() }} --}}
                            Entries
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            {{-- {{ $pemasukans->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>
{{-- END Form --}}
@endsection
