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
            <h2>SUB KRITERIA TES WAWANCARA</h2>
                <div class="row">
                    <div class="col-md-6 img-kriteria-produksi">
                        <img src="{{asset('assets/image/logo-nonproduksi-wawancara.png')}}" alt="" height="320">
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
                            <form method="POST" action="/nonproduksi/wawancara/update">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-md-5 col-form-label produksi-label">Karakter</label>
                                    <div class="col-md-6">
                                     <select class="form-control" id="pilihbagian" name="karakter" >
                                        @for($nilai=1;$nilai< 10;$nilai++)
                                        @if($nilai==2)
                                            <option value="{{$nilai}}" selected ="selected" >{{$nilai}}</option>
                                        @endif
                                            <option value="{{$nilai}}" >{{$nilai}}</option>
                                        @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-2 button">
                                        <!-- <a href="#" class="btn btn-primary btn-md active" role="button" aria-pressed="true">Primary</a> -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-md-5 col-form-label produksi-label">Masa Pengalaman Kerja</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="pilihbagian" name="masa_kerja">
                                            @for($nilai=1;$nilai< 10;$nilai++)
                                            <option value="{{$nilai}}">{{$nilai}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-2 button">
                                        <!-- <a href="#" class="btn btn-primary btn-md active" role="button" aria-pressed="true">Ketrampilan</a> -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-md-5 col-form-label produksi-label">Komunikasi</label>
                                    <div class="col-md-6">
                                     <select class="form-control" id="pilihbagian" name="komunikasi">
                                            <@for($nilai=1;$nilai< 10;$nilai++)
                                                <option value="{{$nilai}}">{{$nilai}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-2 button">
                                        <!-- <a href="#" class="btn btn-primary btn-md active" role="button" aria-pressed="true">Sub Kriteria</a> -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-md-5 col-form-label produksi-label">Attitude</label>
                                    <div class="col-md-6">
                                     <select class="form-control" id="pilihbagian" name="attitude">
                                            <@for($nilai=1;$nilai< 10;$nilai++)
                                                <option value="{{$nilai}}">{{$nilai}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-2 button">
                                        <!-- <a href="#" class="btn btn-primary btn-md active" role="button" aria-pressed="true">Sub Kriteria</a> -->
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