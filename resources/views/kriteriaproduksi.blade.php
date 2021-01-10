@extends('templates.default')
@push('style')
    {{-- aditional style --}}
@endpush


@section('content')
@include('templates.partials._sidebar')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
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
                        <img src="{{asset('assets/image/Logo-isikretria.png')}}" alt="" height="300">
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
                            <form method="POST" action="/kriteria/produksi/update">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-md-4 col-form-label produksi-label">Kedisiplinan</label>
                                    <div class="col-md-5">
                                     <select class="form-control" id="pilihbagian" name="nilai_kidisipilnan" >
                                        @foreach($kriteria as $a)
                                            @for($nilai=0;$nilai< 10;$nilai++)
                                                
                                            @if($a->id_kriteria == 'kp1')
                                                    @if($a->Nilai_perbandingan_kriteria==$nilai && $a->id_kriteria == 'kp1')
                                                        <option value="{{$nilai}}" selected ="selected" >{{$nilai}}</option>
                                                    @else
                                                        <option value="{{$nilai}}" >{{$nilai}}</option>
                                                    @endif
                                                @endif
                                            @endfor
                                        @endforeach
                                        
                                        </select>
                                    </div>
                                    <div class="col-md-3 button">
                                        <!-- <a href="#" class="btn btn-primary btn-md active" role="button" aria-pressed="true">Primary</a> -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-md-4 col-form-label produksi-label">Tes Praktik</label>
                                    <div class="col-md-5">
                                        <select class="form-control" id="pilihbagian" name="tes_praktek">
                                        @foreach($kriteria as $a)
                                            @for($nilai=0;$nilai< 10;$nilai++)
                                                
                                            @if($a->id_kriteria == 'kp2')
                                                    @if($a->Nilai_perbandingan_kriteria==$nilai && $a->id_kriteria == 'kp2')
                                                        <option value="{{$nilai}}" selected ="selected" >{{$nilai}}</option>
                                                    @else
                                                        <option value="{{$nilai}}" >{{$nilai}}</option>
                                                    @endif
                                                @endif
                                            @endfor
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 button">
                                        <a href="/kriteria/produksi/praktik" class="btn btn-primary btn-md active" role="button" aria-pressed="true">Sub Kriteria</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-md-4 col-form-label produksi-label">Tes Wawanacara</label>
                                    <div class="col-md-5">
                                     <select class="form-control" id="pilihbagian" name="tes_wawancara">
                                     @foreach($kriteria as $a)
                                            @for($nilai=0;$nilai< 10;$nilai++)
                                                
                                            @if($a->id_kriteria == 'kp3')
                                                    @if($a->Nilai_perbandingan_kriteria==$nilai && $a->id_kriteria == 'kp3')
                                                        <option value="{{$nilai}}" selected ="selected" >{{$nilai}}</option>
                                                    @else
                                                        <option value="{{$nilai}}" >{{$nilai}}</option>
                                                    @endif
                                                @endif
                                            @endfor
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 button">
                                        <a href="/kriteria/produksi/wawancara" class="btn btn-primary btn-md active" role="button" aria-pressed="true">Sub Kriteria</a>
                                    </div>
                                </div>
                                
                                <button type="sumbit" class="btn btn-primary" name="sumbit">Sumbit</button>
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