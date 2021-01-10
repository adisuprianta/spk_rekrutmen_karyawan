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
        <div class="row home">
            <div class="col-md-10 offset-1 content-home">
                <div class="row">
                    <div class="col-md-5">
                        <p>
Aplikasi perekrutan calon karyawan ini digunakan untuk menentukan calon karyawan terbaik melalui ranking calon karyawan yang dapat dilihat setelah melakukan perhitungan metode Analytical Hierarchy Process (AHP) dan metode Simple Additive Weighting (SAW).

PT. SASMITA ABADI GLOVES merekrut calon karyawan sekitar 10-15 orang setiap kali merekrut, proses perekrutan ini dilakukan 2-3 kali dalam satu tahun.

Informasi mengenenai calon karyawan yang mendaftar pada periode ____ dapat dilihat melalui diagram di bawah ini. </p>
                    </div>
                    <div class="col-md-6 image">
                        <img src="{{asset('assets/image/home-logo.png')}}" alt="" height="240">
                    </div>
                </div>
            </div>
            
        </div>
        <!-- grafik -->
        
    
    

@endsection


@push('scripts')
    @include('templates.partials._scripts')
    <script type="text/javascript" >
    var ctx = document.getElementById("calon_karyawan").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["2015", "2016", "2017", "2018", "2019", "2020"],
				datasets: [{
					label: 'Calon Karyawan',
					data: [12, 19, 3, 23, 2, 3],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
        });
        
    </script>
@endpush


