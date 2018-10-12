@extends('layouts.default')

@section('judul', 'Laporan Murajaah')

@section('head')
	<link rel="stylesheet" type="text/css" href="{{ asset('highcharts/code/css/highcharts.css') }}">
@endsection

@section('konten')

	<div class="row">
		<div class="theia col-sm-8">
			<br>
			<div id="container"></div>
		</div>
		<div class="col-sm-4">
			<br>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Tanggal</th>
						<th>Banyaknya</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data as $d)
						<tr>
							<td>{{ Carbon\Carbon::parse($d->tanggal)->format('d/M/Y') }}</td>
							<td>{{ $d->jumlah_halaman }} halaman</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<center>
				<p>
					<a href="http://localhost/phpmyadmin/sql.php?db=murajaah&goto=db_structure.php&table=murajaah&pos=0" target="_blank" class="btn btn-default">Buka Database</a>
				</p>
				{{ $data->links() }}	
				<hr>
				<p>&copy; <a href='http://muhammadzaini.com'>Zen</a> & Laravel {{ date('Y') }}</p>
			</center>
		</div>
	</div>

@endsection

@section('footer')
	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
	<script type="text/javascript" src='{{ asset("highcharts/code/highcharts.js") }}'></script>
	<script type="text/javascript">

		Highcharts.chart('container', {

			chart: {
				height: 300
			},

		    title: {
		        text: 'Grafik Murajaah'
		    },

		    subtitle: {
		        text: ''
		    },

		    xAxis: {
		        // categories: ['12', '13']
		        categories: [
		        	@foreach($data->sortBy('tanggal') as $d)
		        		'{{ Carbon\Carbon::parse($d->tanggal)->format('d/M/Y') }}',
		        	@endforeach
		        ]
		    },

		    yAxis: {
		        title: {
		            text: 'Jumlah Halaman'
		        }
		    },

		    legend: {
		        layout: 'vertical',
		        align: 'right',
		        verticalAlign: 'middle'
		    },

		    plotOptions: {
		        series: {
		            label: {
		                connectorAllowed: false
		            }
		            // pointStart: 1
		        }
		    },

		    series: [{
		        name: 'Murajaah',
		        // data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
		        data: [
			        @foreach($data->sortBy('tanggal') as $d)
			        	{{ $d->jumlah_halaman }},
			        @endforeach
		        ]
		    }],

		    responsive: {
		        rules: [{
		            condition: {
		                maxWidth: 500
		            },
		            chartOptions: {
		                legend: {
		                    layout: 'horizontal',
		                    align: 'center',
		                    verticalAlign: 'bottom'
		                }
		            }
		        }]
		    }

		});

	</script>
	<script type="text/javascript" src="{{ asset('ResizeSensor.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('theia-sticky-sidebar.min.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.theia').theiaStickySidebar({
				// additionalMarginTop: 20
				// additionalMarginBottom: 20
			});
		});
	</script>
@endsection