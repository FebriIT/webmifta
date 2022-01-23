@extends('layouts.masteradmin')

@section('content')
<!-- Cari dan Tambah -->
<div class="container-fluid">
	@if(auth()->user()->role=='admin'|| auth()->user()->role=='guru')
	<div class="row searchtambah panel">
		<div class="col-6 search">
			<form class="navbar-form navbar-left" action="/{{ auth()->user()->role }}/mapel" method="GET">
				<div class="input-group">
					<input type="text" name="cari" value="" class="form-control" placeholder="Cari Matapelajaran...">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-primary">Go</button>
					</span>
				</div>
			</form>
		</div>
		<div class="col-6 tambah">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary navbar-btn-right tambah" data-toggle="modal"
				data-target="#exampleModal">
				Tambah Data
			</button>
		</div>
	</div>

	@endif
</div>
<!-- end Cari dan Tambah -->
<div class="col-12">
	<div class="panel">

		<div class="col-md-6">
			<div class="panel-heading">
				<h3 class="panel-title">Mata Pelajaran</h3>
			</div>
		</div>
		<div class="col-md-6">


			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
				aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title" id="exampleModalLabel">Tambah Data Matapelajaran</h3>

						</div>
						<div class="modal-body">
							@if (auth()->user()->role=='admin'||auth()->user()->role=='guru')
							<form action="/{{ auth()->user()->role }}/mapel/create" method="POST">
								{{ csrf_field() }}


								<div class="form-group">
									<label for="exampleInputEmail1">Mata Pelajaran</label>
									<input name="nama" type="text" class="form-control" id="exampleInputEmail1"
										aria-describedby="emailHelp" placeholder="Mata Pelajaran">
								</div>


								<div class="form-group">
									<label
										for="exampleInputEmail1 {{ $errors->has('kelas_id')?' has-error':'' }}">Kelas</label>
									@foreach ($kelas as $kelas)

									<th class="text-center">
										<label class="fancy-checkbox">
											<input type="checkbox" name="kelas[]" value="{{ $kelas->id }}">
											<span>{{ $kelas->nama }}</span>
										</label>
									</th>
									@endforeach

								</div>
								<input type="text" value="{{ $id }}" hidden name="id_tahun">
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</form>

							@endif


						</div>

					</div>
				</div>
			</div>
		</div>


		<div class="panel-body">
			<table class="table table-hover css-serial">

				<thead>
					<tr>

						<th>ID</th>
						<th>Mata Pelajaran</th>
						<th>Kelas</th>
						@if (auth()->user()->role=='admin')
							
						<th>Aksi</th>
						@endif
					</tr>
				</thead>
				<tbody>
					@foreach($data_mapel as $mapel)

					<tr>
						<td>{{$mapel->id}}</td>
						<td class="text-primary" style="font-weight: bold;">{{$mapel->nama}}</td>
						<td>
							@foreach ($mapel->kelas as $kelas)
							<div class="badge">{{ $kelas->nama }}</div>
							@endforeach
						</td>

						@if (auth()->user()->role=='admin')
						<td>
							
							<a href="/admin/mapel/{{ $mapel->id }}/hapus" class="btn btn-danger btn-sm"
								onclick="return confirm('Apakah Anda Yakin Inggin Dihapus ?')">
								<i class="fa fa-trash-o"></i> Hapus
							</a>
						</td>
						
						@endif

					</tr>

					@endforeach
				</tbody>
			</table>

		</div>


	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<div class="panel">
				<div class="panel-heading">
					<div class="panel-title">
						Data Tahun Akademik {{ $tahun->tahun }}
					</div>
					<div class="panel-body">

						@if ($data_mapel->count()==0)
						<p>Jumlah Matapelajaran : 0</p>
						@else
						<p>Jumlah Matapelajaran : {{ $data_mapel->count() }} </p>
						@endif
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

@endsection