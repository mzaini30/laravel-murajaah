@extends('layouts.default')

@section('judul', 'Murajaah - Edit')

@section('konten')
	<h1>Edit Data</h1>
	<hr>
	<form method="post" action="">

		{!! csrf_field() !!}

		<div class="form-group">
			<div class="row">
				<div class="col-sm-4">
					<label for="tanggal">Tanggal</label>
				</div>
				<div class="col-sm-8">
					<input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $data->tanggal->format('Y-m-d') }}">
				</div>
			</div>
		</div>
		
		<div class="form-group">
			<div class="row">
				<div class="col-sm-4">
					<label for="halaman">Jumlah Halaman</label>
				</div>
				<div class="col-sm-8">
					<input type="number" name="jumlah_halaman" id="halaman" class="form-control" value="{{ $data->jumlah_halaman }}">
				</div>
			</div>
		</div>

		<center>
			<input type="submit" name="" value="Selesai" class="btn btn-success">
		</center>

	</form>
@endsection