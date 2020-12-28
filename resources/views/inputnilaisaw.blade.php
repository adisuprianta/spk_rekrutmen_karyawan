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
                    <div class="col-md-12 mt-5">
                    <form class="row form-saw">
                        <div class="col-md-4 tanpa-sub">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kedisiplinan</label>
                                <input type="number" class="form-control"  id="quantity" name="kedisiplinan" min="0" max="100" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h4 class="judul-group">Tes Wawancara</h4>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Karakter</label>
                                <input type="number" class="form-control"  id="quantity" name="karkater" min="0" max="100" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Masa Pengalaaman Kerja</label>
                                <input type="number" class="form-control"  id="quantity" name="pengalaman" min="0" max="100" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Komunikasi</label>
                                <input type="number" class="form-control"  id="quantity" name="komunikasi" min="0" max="100" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Attitude</label>
                                <input type="number" class="form-control"  id="quantity" name="attitude" min="0" max="100" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h4 class="judul-group">Tes Praktek</h4>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kerjasama</label>
                                <input type="number" class="form-control"  id="quantity" name="kerjasama" min="0" max="100" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kreativitas</label>
                                <input type="number" class="form-control"  id="quantity" name="kreativitas" min="0" max="100" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ketrampilan</label>
                                <input type="number" class="form-control"  id="quantity" name="ketrampilan" min="0" max="100" >
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>

                <!-- non -->
                @else
                <div class="col-md-12 mt-5 ">
                    <form class="row form-saw">
                        <div class="col-md-4 tanpa-sub">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kedisiplinan</label>
                                <input type="number" class="form-control"  id="quantity" name="kedisiplinan" min="0" max="100" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tes Tulis</label>
                                <input type="number" class="form-control"  id="quantity" name="testulis" min="0" max="100" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h4 class="judul-group">Tes Wawancara</h4>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Karakter</label>
                                <input type="number" class="form-control"  id="quantity" name="karkater" min="0" max="100" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Masa Pengalaaman Kerja</label>
                                <input type="number" class="form-control"  id="quantity" name="pengalaman" min="0" max="100" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Komunikasi</label>
                                <input type="number" class="form-control"  id="quantity" name="komunikasi" min="0" max="100" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Attitude</label>
                                <input type="number" class="form-control"  id="quantity" name="attitude" min="0" max="100" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h4 class="judul-group">Psikotes</h4>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kepribadian</label>
                                <input type="number" class="form-control"  id="quantity" name="kepribadian" min="0" max="100" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Moral</label>
                                <input type="number" class="form-control"  id="quantity" name="moral" min="0" max="100" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kepemimpinan</label>
                                <input type="number" class="form-control"  id="quantity" name="kepemimpinan" min="0" max="100" >
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection

@push('scripts')
    @include('templates.partials._scripts')
    <!--  -->
    
@endpush