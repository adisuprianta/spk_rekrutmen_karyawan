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
            <div class="col-md-12 judul">
                <H1>Input Calon Karyawan</H1>
                <!-- <p>{{$id}}</p> -->
            </div>
             
        </div>
        <div class="row">
            <div class="col-md-6 offset-3 form-input">
            <form method="POST" action="/karyawan/input" enctype="multipart/form-data">
            {{ csrf_field() }}
                <input type="hidden" name="id_bagian" value="{{$id}}">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Calon Karyawan</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama" placeholder="Enter nama">
                </div>
                
                
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">No HP</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nohp" placeholder="Enter no hp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Lahir</label>
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                        <input placeholder="masukkan tanggal Awal" type="date" class="form-control datepicker" name="tgl_lahir">
                    </div>
                </div>
                <div class="form-group row mt-4">
                
                    <div class="col-md-4">
                        <label for="exampleInputEmail1">Jenis Kelamin : </label>
                    </div>
                    <div class="col-md-8">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="lengan1" value="L">
                            <label class="form-check-label" for="lengan1">Laki Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="lengan2" value="P">
                            <label class="form-check-label" for="lengan2">Perempuan</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Pendidikan</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="pendidikan" placeholder="Enter pendidikan">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Alamat</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="alamat"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Dokumen file</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @include('templates.partials._scripts')
    
    
@endpush