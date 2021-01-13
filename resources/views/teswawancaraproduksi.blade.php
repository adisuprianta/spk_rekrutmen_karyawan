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
            <h2>SUB KRITERIA TES WAWANCARA</h2>
                <div class="row">
                    <div class="col-md-6 img-kriteria-produksi">
                        <img src="{{asset('assets/image/logo-produksi-wawancara.png')}}" alt="" height="320">
                    </div>
                    <div class="col-md-6 kriteria-text">
                        <div class="row">
                            <div class="col-md-10 offset-1">
                                <h3>Tentukan Tingkat Kepentingan Sub Kriteria</h3>
                                <p>
                                    Untuk Menentukan Tingkat Kepentingan kamu dapat 
                                    mengisi masing - masing sub kriteria dengan nilai sebagai  berikut : 
                                </p>
                                <ul>
                                        <li>1 - 3 = Cukup Penting</li>
                                        <li>4 - 6 = Penting</li>
                                        <li>7 - 9 = Sangat Penting </li>
                                </ul>
                                
                            </div>
                        </div>
                        <div class="col-md-12 form-produksi">
                            <form method="POST" action="/produksi/wawancara/update">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-md-5 col-form-label produksi-label">Karakter</label>
                                    <div class="col-md-6">
                                     <select class="form-control" id="pilihbagian" name="karakter" >
                                        
                                        @foreach($kriteria as $a)
                                            @for($nilai=0;$nilai< 10;$nilai++)
                                            @if($a->id_sub_kriteria == 'Tw1')
                                                    @if($a->nilai_perbandingan_sub_kriteria==$nilai && $a->id_sub_kriteria == 'Tw1')
                                                        <option value="{{$nilai}}" selected ="selected" >{{$nilai}}</option>
                                                    @else
                                                        <option value="{{$nilai}}" >{{$nilai}}</option>
                                                    @endif
                                                @endif
                                            @endfor
                                        @endforeach
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
                                            
                                        @foreach($kriteria as $a)
                                            @for($nilai=0;$nilai< 10;$nilai++)
                                            @if($a->id_sub_kriteria == 'Tw2')
                                                    @if($a->nilai_perbandingan_sub_kriteria==$nilai && $a->id_sub_kriteria == 'Tw2')
                                                        <option value="{{$nilai}}" selected ="selected" >{{$nilai}}</option>
                                                    @else
                                                        <option value="{{$nilai}}" >{{$nilai}}</option>
                                                    @endif
                                                @endif
                                            @endfor
                                        @endforeach
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
                                            
                                        @foreach($kriteria as $a)
                                            @for($nilai=0;$nilai< 10;$nilai++)
                                            @if($a->id_sub_kriteria == 'Tw3')
                                                    @if($a->nilai_perbandingan_sub_kriteria==$nilai && $a->id_sub_kriteria == 'Tw3')
                                                        <option value="{{$nilai}}" selected ="selected" >{{$nilai}}</option>
                                                    @else
                                                        <option value="{{$nilai}}" >{{$nilai}}</option>
                                                    @endif
                                                @endif
                                            @endfor
                                        @endforeach
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
                                            
                                        @foreach($kriteria as $a)
                                            @for($nilai=0;$nilai< 10;$nilai++)
                                            @if($a->id_sub_kriteria == 'Tw4')
                                                    @if($a->nilai_perbandingan_sub_kriteria==$nilai && $a->id_sub_kriteria == 'Tw4')
                                                        <option value="{{$nilai}}" selected ="selected" >{{$nilai}}</option>
                                                    @else
                                                        <option value="{{$nilai}}" >{{$nilai}}</option>
                                                    @endif
                                                @endif
                                            @endfor
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2 button">
                                        <!-- <a href="#" class="btn btn-primary btn-md active" role="button" aria-pressed="true">Sub Kriteria</a> -->
                                    </div>
                                </div>
                                
                                <button type="sumbit" class="btn btn-primary" name="sumbit">Submit</button>
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