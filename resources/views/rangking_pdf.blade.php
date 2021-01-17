@extends('templates.default')
@push('style')
    {{-- aditional style --}}
@endpush


@section('content')
    <center>
        <H1>Rangking Calon Karyawan {{$a[0]}} </H1>
        <br>
        
        <table  class="table table-bordered">
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
    </center>
    
        
                                        
    
@endsection

@push('scripts')
    @include('templates.partials._scripts')
    
@endpush