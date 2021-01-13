@extends('templates.default')
@push('style')
    {{-- aditional style --}}
@endpush


@section('content')
@include('templates.partials._sidebar')
    <div class="container">
        <div class="row">
        
            <div class="col-md-8 offset-2 keterangansaw">
                @foreach($karyawan as $k)
                <h2>Nilai {{$k->Nama_Calon_karyawan}}</h2>
                @endforeach
                <p>Silahkan menginputkan nilai karyawan dari skala 0-100 sesuai 
                    dengan hasil yang diperoleh karyawan melalui penilaian sub kriteria</p>
               
            </div>
            <!-- produksi -->
            @foreach($karyawan as $k)
                @if($k->id_bagian == 'bg0')
                    @if($cek[0] == 1)
                        <div class="col-md-12 mt-5">
                            <form class="row form-saw" method="post" action="input/saw">
                            {{ csrf_field() }}
                            @foreach($karyawan as $k)
                            <input type="hidden" name="id_bagian" value="{{$k->id_bagian}}"/>
                            <input type="hidden" name="id_karyawan" value="{{$k->id_calon_karyawan}}"/>
                            @endforeach
                            
                                <div class="col-md-4 tanpa-sub">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kedisiplinan</label>
                                        <input type="number" class="form-control"  id="quantity" name="kedisiplinan" min="0" max="100" value="{{$ka[0]}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="judul-group">Tes Wawancara</h4>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Karakter</label>
                                        <input type="number" class="form-control"  id="quantity" name="karakter" min="0" max="100" value="{{$s[0]}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Masa Pengalaaman Kerja</label>
                                        <input type="number" class="form-control"  id="quantity" name="pengalaman" min="0" max="100" value="{{$s[1]}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Komunikasi</label>
                                        <input type="number" class="form-control"  id="quantity" name="komunikasi" min="0" max="100" value="{{$s[2]}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Attitude</label>
                                        <input type="number" class="form-control"  id="quantity" name="attitude" min="0" max="100" value="{{$s[3]}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="judul-group">Tes Praktek</h4>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kerjasama</label>
                                        <input type="number" class="form-control"  id="quantity" name="kerjasama" min="0" max="100" value="{{$s[4]}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kreativitas</label>
                                        <input type="number" class="form-control"  id="quantity" name="kreativitas" min="0" max="100" value="{{$s[5]}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ketrampilan</label>
                                        <input type="number" class="form-control"  id="quantity" name="ketrampilan" min="0" max="100" value="{{$s[6]}}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    @else
                    <div class="col-md-12 mt-5">
                            <form class="row form-saw" method="post" action="input/saw">
                            {{ csrf_field() }}
                            @foreach($karyawan as $k)
                            <input type="hidden" name="id_bagian" value="{{$k->id_bagian}}"/>
                            <input type="hidden" name="id_karyawan" value="{{$k->id_calon_karyawan}}"/>
                            @endforeach
                            
                                <div class="col-md-4 tanpa-sub">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kedisiplinan</label>
                                        <input type="number" class="form-control"  id="quantity" name="kedisiplinan" min="0" max="100" value="0">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="judul-group">Tes Wawancara</h4>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Karakter</label>
                                        <input type="number" class="form-control"  id="quantity" name="karakter" min="0" max="100" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Masa Pengalaaman Kerja</label>
                                        <input type="number" class="form-control"  id="quantity" name="pengalaman" min="0" max="100" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Komunikasi</label>
                                        <input type="number" class="form-control"  id="quantity" name="komunikasi" min="0" max="100" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Attitude</label>
                                        <input type="number" class="form-control"  id="quantity" name="attitude" min="0" max="100" value="0">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="judul-group">Tes Praktek</h4>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kerjasama</label>
                                        <input type="number" class="form-control"  id="quantity" name="kerjasama" min="0" max="100" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kreativitas</label>
                                        <input type="number" class="form-control"  id="quantity" name="kreativitas" min="0" max="100" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ketrampilan</label>
                                        <input type="number" class="form-control"  id="quantity" name="ketrampilan" min="0" max="100" value="0">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    @endif
                <!-- non -->
                @else
                    @if($cek[0] ==1)
                        <div class="col-md-12 mt-5 ">
                            <form class="row form-saw" method="post" action="input/saw">
                            {{ csrf_field() }}
                            @foreach($karyawan as $k)
                            <input type="hidden" name="id_bagian" value="{{$k->id_bagian}}"/>
                            <input type="hidden" name="id_karyawan" value="{{$k->id_calon_karyawan}}"/>
                            @endforeach
                                <div class="col-md-4 tanpa-sub">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kedisiplinan</label>
                                        <input type="number" class="form-control"  id="quantity" name="kedisiplinan" min="0" max="100" value="{{$ka[0]}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tes Tulis</label>
                                        <input type="number" class="form-control"  id="quantity" name="testulis" min="0" max="100" value="{{$ka[1]}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="judul-group">Tes Wawancara</h4>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Karakter</label>
                                        <input type="number" class="form-control"  id="quantity" name="karakter" min="0" max="100" value="{{$s[0]}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Masa Pengalaaman Kerja</label>
                                        <input type="number" class="form-control"  id="quantity" name="pengalaman" min="0" max="100" value="{{$s[1]}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Komunikasi</label>
                                        <input type="number" class="form-control"  id="quantity" name="komunikasi" min="0" max="100" value="{{$s[2]}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Attitude</label>
                                        <input type="number" class="form-control"  id="quantity" name="attitude" min="0" max="100" value="{{$s[3]}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="judul-group">Psikotes</h4>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kepribadian</label>
                                        <input type="number" class="form-control"  id="quantity" name="kepribadian" min="0" max="100" value="{{$s[4]}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Moral</label>
                                        <input type="number" class="form-control"  id="quantity" name="moral" min="0" max="100" value="{{$s[5]}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kepemimpinan</label>
                                        <input type="number" class="form-control"  id="quantity" name="kepemimpinan" min="0" max="100" value="{{$s[6]}}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    @else
                        <div class="col-md-12 mt-5 ">
                            <form class="row form-saw" method="post" action="input/saw">
                            {{ csrf_field() }}
                            @foreach($karyawan as $k)
                            <input type="hidden" name="id_bagian" value="{{$k->id_bagian}}"/>
                            <input type="hidden" name="id_karyawan" value="{{$k->id_calon_karyawan}}"/>
                            @endforeach
                                <div class="col-md-4 tanpa-sub">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kedisiplinan</label>
                                        <input type="number" class="form-control"  id="quantity" name="kedisiplinan" min="0" max="100" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tes Tulis</label>
                                        <input type="number" class="form-control"  id="quantity" name="testulis" min="0" max="100" value="0">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="judul-group">Tes Wawancara</h4>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Karakter</label>
                                        <input type="number" class="form-control"  id="quantity" name="karakter" min="0" max="100" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Masa Pengalaaman Kerja</label>
                                        <input type="number" class="form-control"  id="quantity" name="pengalaman" min="0" max="100" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Komunikasi</label>
                                        <input type="number" class="form-control"  id="quantity" name="komunikasi" min="0" max="100" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Attitude</label>
                                        <input type="number" class="form-control"  id="quantity" name="attitude" min="0" max="100" value="0">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="judul-group">Psikotes</h4>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kepribadian</label>
                                        <input type="number" class="form-control"  id="quantity" name="kepribadian" min="0" max="100" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Moral</label>
                                        <input type="number" class="form-control"  id="quantity" name="moral" min="0" max="100" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kepemimpinan</label>
                                        <input type="number" class="form-control"  id="quantity" name="kepemimpinan" min="0" max="100" value="0">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    @endif
                @endif
            @endforeach
        </div>
    </div>
@endsection

@push('scripts')
    @include('templates.partials._scripts')
    <!--  -->
    
@endpush