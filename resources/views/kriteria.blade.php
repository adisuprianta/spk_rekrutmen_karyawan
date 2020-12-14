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
        <!-- home -->
        <div class="row">
            <div class="col-md-12 content-kriteria">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{asset('assets/image/logo-kriteria.png')}}" alt="" height="350">
                    </div>
                    <div class="col-md-4">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                            Natus perferendis praesentium mollitia sunt porro accusamus 
                            rerum expedita iusto error, 
                            voluptatem beatae minima iste, possimus fugiat 
                            ad sit ab vel quaerat et enim quidem ipsa laborum voluptatibus! Eius quam consequuntur error?</p>
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


