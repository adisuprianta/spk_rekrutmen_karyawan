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
            <h2>SUB KRITERIA PSIKOTES</h2>
                <div class="row">
                    <div class="col-md-6 img-kriteria-produksi">
                        <img src="{{asset('assets/image/logo-psikotes.png')}}" alt="" height="340">
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
                            <form method="POST" action="/nonproduksi/psikotes/update">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-md-4 col-form-label produksi-label">Kepribadian</label>
                                    <div class="col-md-6">
                                     <select class="form-control" id="pilihbagian" name="kepribadian" >
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
                                    <label for="staticEmail" class="col-md-4 col-form-label produksi-label">Moral</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="pilihbagian" name="moral">
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
                                    <label for="inputPassword" class="col-md-4 col-form-label produksi-label">Kepemimpinan</label>
                                    <div class="col-md-6">
                                     <select class="form-control" id="pilihbagian" name="kepemimpinan">
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