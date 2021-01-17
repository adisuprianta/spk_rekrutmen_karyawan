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
                
                <H1>Rangking Calon Karyawan {{$a[0]}} </H1>
                
            </div>
            <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                            <a href="/home/pdf/{{$a[0]}}" class="btn btn-info float-left active mb-3" role="button" aria-pressed="true"> 
                                
                                Cetak Pdf</a>
                                <form class="form justify-content-end row" method="get" action="">
                                {{ csrf_field() }}
                                <input type="hidden" value="" name="id_bagian">
                                    <div class="form-group  mb-2 col-md-3">
                                        <!-- <label for="inputPassword2" class="sr-only">Password</label> -->
                                        <input placeholder="Tanggal Awal" type="text" class="form-control datepicker" name="tgl_awal">
                                    </div>
                                    <div class="form-group  mb-2 col-md-3">
                                        <!-- <label for="inputPassword2" class="sr-only">Password</label> -->
                                        <input placeholder="Tanggal Akhir" type="text" class="form-control datepicker" name="tgl_akhir">
                                    </div>
                                    <button type="submit" class="btn btn-info mb-2">Search</button>
                                </form>
                            

                                <!-- <a href="#" class="btn btn-info float-right mb-3" data-toggle="modal" data-target="#createModal"> <i class="fa fa-plus"></i>
                                Tambah Data</a> -->
                            </div>
                            <div class="card-body">
                                <table id="basic-datatables" class="table table-striped table-bordered table-responsive-lg table-responsive-md table-responsive-sm">
                                    @if($a[0]=="Produksi")
                                        @if($kosong == 0)
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Calon Karyawan</th>
                                                    <th>Kedisiplinan</th>
                                                    <!-- <th>Jenis Kelamin</th> -->
                                                    <th>Tes Wawancara</th>
                                                    <th>Tes Praktek</th>
                                                    <th>Nilai Akhir</th>
                                                    <th>Rangking</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        @else
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Calon Karyawan</th>
                                                    <th>Kedisiplinan</th>
                                                    <!-- <th>Jenis Kelamin</th> -->
                                                    <th>Tes Wawancara</th>
                                                    <th>Tes Praktek</th>
                                                    <th>Nilai Akhir</th>
                                                    <th>Rangking</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $c = 1
                                            @endphp
                                            @php
                                                $i = 0
                                            @endphp
                                            @foreach($sql as $a)
                                            
                                            
                                            <tr>
                                                <td>{{$c++}}</td>
                                                <td>{{$a->Nama_Calon_karyawan}}</td>
                                                <td>{{$a->nilai_kriteria}}</td>
                                                <td>{{$tesw[$i]}}</td>
                                                <td>{{$tespraktik[$i++]}}</td>
                                                <td>{{$a->bobot_akhir*100}}</td>
                                                <td>{{$a->rangking}}</td>
                                                
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                    <!-- non -->
                                    @else
                                        @if($kosong == 0)
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Calon Karyawan</th>
                                                    <th>Kedisiplinan</th>
                                                    <th>Tes Tulis</th>
                                                    <!-- <th>Jenis Kelamin</th> -->
                                                    <th>Tes Wawancara</th>
                                                    <th>Psikotes</th>
                                                    <th>Total</th>
                                                    <th>Rangking</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        @else
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Calon Karyawan</th>
                                                    <th>Kedisiplinan</th>
                                                    <th>Tes Tulis</th>
                                                    <!-- <th>Jenis Kelamin</th> -->
                                                    <th>Tes Wawancara</th>
                                                    <th>Psikotes</th>
                                                    <th>Total</th>
                                                    <th>Rangking</th>
                                                </tr>
                                            </thead>
                                            <tbody>    
                                            @php
                                                $c = 1
                                            @endphp
                                            @php
                                                $i = 0
                                            @endphp
                                            @foreach($sql as $a)
                                            
                                            <tr>
                                                <td>{{$c++}}</td>
                                                <td>{{$a->Nama_Calon_karyawan}}</td>
                                                <td>{{$a->nilai_kriteria}}</td>
                                                <td>{{$test[$i]}}</td>
                                                <td>{{$tesw[$i]}}</td>
                                                <td>{{$psikotes[$i++]}}</td>
                                                <td>{{$a->bobot_akhir}}</td>
                                                <td>{{$a->rangking}}</td>
                                                
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                    @endif
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
    <script type="text/javascript">
    $(function(){
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });
        });
    $(document).ready( function () {
        $('#basic-datatables').DataTable();
    } );

        function enableButton(kar){
            val ='';
            id= $(kar).val();
            if(kar.checked) {
                val = 'approved';
            }else{
                val = 'rejected';
            }
            console.log(kar.value);
            $.get({
                url:"{{url('karyawan/check')}}/"+ id + "/"+ val,
                type:'GET',
                // dataType: 'json',
                data: 
                    {
                        // "id_calon_karyawan": kar, 
                        "_token": "{{ csrf_token() }}",
                    },
                success:function(response){
                    // if(val != 'rejected'){
                    //     $(this).find("btn-nilai").prop('disabled',false);
                    // }else{
                    //     $(this).find("btn-nilai").prop('disabled',true);
                    // }
                    submit = document.getElementById("submit"+kar.value);
                    // che=document.getElementById(i);
                    console.log(kar);
                    submit.disabled = kar.checked ? false:true;
                    if(!submit.disabled){
                        submit.focus();
                    }
                    alert('data telah diperbarui ! 😍😍😍😍😍');
                }    
            });
        }
    </script>
@endpush