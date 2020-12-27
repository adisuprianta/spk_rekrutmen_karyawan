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
            {{$karyawan}}
           
        </div>
    </div>
@endsection

@push('scripts')
    @include('templates.partials._scripts')
    <!--  -->
    
@endpush