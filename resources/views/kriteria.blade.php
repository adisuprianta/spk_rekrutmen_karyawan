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
        <!-- home -->
        <div class="row">
            <div class="col-md-12 content-kriteria">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{asset('assets/image/logo-kriteria.png')}}" alt="" height="350">
                    </div>
                    <div class="col-md-4">
                        <p>Untuk menginputkan kriteria calon karyawan, maka HRD harus memilih terlebih dahulu departemen bagian yang terdapat 2(dua) bagian yaitu bagian produksi dan bagian non produksi. Dimana masing-masing mempunyai kriteria yang unik dan beberapa tidak sama.</p>
                        <hr size="4px" color="#fff" width="100%" align="center">
                        <div class="bagian">
                            <h4>Pilih Departemen Bagian</h4>
                            <form method="POST" action="">
                            {{ csrf_field() }}
                                <div class="form-group row">
                                    <!-- <label for="sel1"></label> -->
                                    <div class="col-md-8">  
                                        <select class="form-control" id="pilihbagian" name="pilihbagian">
                                        <option value="1">Produksi</option>
                                        <option value="2">Non Produksi</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary" >Isi Kreteria</button>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
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


