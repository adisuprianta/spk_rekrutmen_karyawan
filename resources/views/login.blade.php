@extends('templates.default')
@push('style')
    <!-- {{-- aditional style --}} -->
    <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
@endpush

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Login</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12  form-login-admin">
            <div class="row">
                <div class="col-6">
                    <img class="icon-login-header" src="{{asset('assets/image/login_logo.png')}}" alt="" height="250">
                </div>
                <div class="col-5 form-login">
                    <h3>PT. SASMITA ABADI GLOVES</h3>
                    <form>
                        <div class="form-group row">
                            <span><i class="fa fa-id-card"></i></span>
                            <div class="col-sm-10">
                            <input type="email" class="form-control form-control-login" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Pengguna">
                            </div>
                        </div>
                        <div class="form-group row">
                        <span><i class="fa fa-unlock-alt"></i></span>
                            <div class="col-sm-10">
                            <input type="password" class="form-control form-control-login" id="inputPassword" placeholder="Kata Sandi">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Masuk</button>
                    </form>
            </div>
            </div>
            
                              
            </div>
        </div>
    </div>

@endsection


@push('scripts')
@include('templates.partials._scripts')
@endpush