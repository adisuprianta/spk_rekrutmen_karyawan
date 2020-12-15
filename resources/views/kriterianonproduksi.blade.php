@extends('templates.default')
@push('style')
    {{-- aditional style --}}
@endpush


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('templates.partials._navbar')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12  content-kriteria-produksi">
                @if ($message = Session::get('sukses'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                @if ($message = Session::get('gagal'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                @if ($message = Session::get('peringatan'))
                <div class="alert alert-warning alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
                </div>
                @endif
            <h2>KRITERIA KARYAWAN PRODUKSI</h2>
                <div class="row">
                    <div class="col-md-6 img-kriteria-produksi">
                        <img src="{{asset('assets/image/logo-nonproduksi.png')}}" alt="" height="300">
                    </div>
                    <div class="col-md-6 kriteria-text">
                        <div class="row">
                            <div class="col-md-10 offset-1">
                                <h3>Tentukan Tingkat Kepentingan Kriteria</h3>
                                <p>
                                    Untuk Menentukan Tingkat Kepentingan kamu dapat 
                                    mengisi masing - masing kriteria dengan nilai sebagai  berikut : 
                                </p>
                                <ul>
                                        <li>1 - 3 = Cukup Penting</li>
                                        <li>4 - 6 = Penting</li>
                                        <li>7 - 9 = Sangat Penting </li>
                                </ul>
                                
                            </div>
                        </div>
                        <div class="col-md-12 form-produksi">
                            <form method="POST" action="/kriteria/nonproduksi/update">
                            {{ csrf_field() }}
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-md-4 col-form-label produksi-label">Kedisiplinan</label>
                                    <div class="col-md-5">
                                     <select class="form-control" id="Kedisiplinan" name="Kedisiplinan">
                                        @for($nilai=1;$nilai< 10;$nilai++)
                                            <option>{{$nilai}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-3 button">
                                        <!-- <a href="#" class="btn btn-primary btn-md active" role="button" aria-pressed="true">Primary</a> -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-md-4 col-form-label produksi-label">Tes Tulis</label>
                                    <div class="col-md-5">
                                     <select class="form-control" id="testulis" name="Tes_Tulis">
                                        @for($nilai=1;$nilai< 10;$nilai++)
                                            <option>{{$nilai}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-3 button">
                                        <!-- <a href="#" class="btn btn-primary btn-md active" role="button" aria-pressed="true">Primary</a> -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-md-4 col-form-label produksi-label">Tes Wawanacara</label>
                                    <div class="col-md-5">
                                        <select class="form-control" id="pilihbagian" name="Tes_wawancara">
                                            @for($nilai=1;$nilai< 10;$nilai++)
                                            <option>{{$nilai}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-3 button">
                                        <a href="#" class="btn btn-primary btn-md active" role="button" aria-pressed="true">Sub Kriteria</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-md-4 col-form-label produksi-label">Psikotes</label>
                                    <div class="col-md-5">
                                     <select class="form-control" id="pilihbagian" name="Psikotes">
                                            <@for($nilai=1;$nilai< 10;$nilai++)
                                                <option>{{$nilai}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-3 button">
                                        <a href="#" class="btn btn-primary btn-md active" role="button" aria-pressed="true">Sub Kriteria</a>
                                    </div>
                                </div>
                                
                                <button type="Sumbit" class="btn btn-primary">Sumbit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @include('templates.partials._scripts')
    
@endpush