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
            <div class="col-md-12 judul">
                <H1>CALON KARYAWAN NONPRODUKSI</H1>
                
            </div>
            <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <!-- <strong class="card-title">Tabel Data Kain</strong> -->
                                <!-- <a href="#" class="btn btn-info float-left mb-3" data-toggle="modal" data-target="#createModal"> <i class="fa fa-plus"></i>
                                Tambah Data</a> -->
                                @foreach($bagian as $p)
                                <a href="/home/karyawan/{{$p->id_bagian}}" class="btn btn-info float-left active mb-3" role="button" aria-pressed="true"> 
                                <i class="fa fa-plus"></i>
                                Tambah Data</a>
                                @endforeach
                                <form class="form-inline float-right">
                                    <!-- <div class="form-group mb-2">
                                        <label for="staticEmail2" class="sr-only">Email</label>
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="email@example.com">
                                    </div> -->
                                    <div class="form-group mx-sm-3 mb-2">
                                        <!-- <label for="inputPassword2" class="sr-only">Password</label> -->
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option value="01">Januari</option>
                                            <option value="02">Februari</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Agustus</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="12">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <!-- {{$mulai = date('Y')-50}} -->
                                            @for($i=2000; $i<=2020; $i++)
                                                <option value="{{$i}}" >{{$i}}</option>
                                            @endfor
                                        </select>
                                        
                                    </div>
                                    <button type="submit" class="btn btn-info mb-2">Serach</button>
                                </form>

                                <!-- <a href="#" class="btn btn-info float-right mb-3" data-toggle="modal" data-target="#createModal"> <i class="fa fa-plus"></i>
                                Tambah Data</a> -->
                            </div>
                            <div class="card-body">
                                <table id="basic-datatables" class="table table-striped table-bordered table-responsive-lg table-responsive-md table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Karyawan</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Berkas</th>
                                            <th>Cek</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--  -->
                                        <tr>
                                        <td>1</td>
                                    <td>I Ketut Adi Suprianta</td>
                                    <td>Laki Laki</td>
                                    <td>Email</td>
                                    <td>Surabaya</td>
                                    <td>cc</td>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="check" onclick="enablebutton(this)">
                                        </div>
                                    </td>
                                    <td>
                                        <!-- <a class="btn btn-success btn-sm " id="edit" href="" data-nama="" data-desc="" href="#">
                                            Hitung
                                        </a> -->
                                        <button class="btn btn-success btn-sm " id="submit" href="" data-nama="" data-desc="" disabled="disabled">
                                            
                                            Hitung
                                        </button>
                                        <!-- <button href="" class="btn btn-danger btn-sm" id="delete" data-title="">
                                            <i class="fa fa-trash"> </i>
                                        </button> -->
                                    </td>
                                        </tr>
                                        <!-- -->
                                    </tbody>
                                </table>                                
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