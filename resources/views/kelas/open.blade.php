@extends('layouts.masteradmin')

@section('content')

<div class="col-12">
	<div class="panel">

		<div class="col-md-12">
			<div class="panel-heading">
				<h3 class="panel-title">Kelas <span>{{$data_kelas->nama}}</span> <a href="/{{ auth()->user()->role }}/forum/{{ $id }}" class="btn btn-primary btn-sm navbar-btn-right" >Forum</a></h3>
				
			</div>
			<!-- </div> -->
			<div class="col-md-6">
				


				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
					aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h3 class="modal-title" id="exampleModalLabel">Tambah Data Materi Pembelajaran</h3>

							</div>
							<div class="modal-body">
								@if (auth()->user()->role=='admin'||auth()->user()->role=='guru')
								<form action="/{{ auth()->user()->role }}/materi/create" method="POST"
									enctype="multipart/form-data">
									{{ csrf_field() }}


									<div class="form-group {{ $errors->has('mapel')?' has-error':'' }}">
										<label for="exampleInputEmail1">Mata Pelajaran</label>
										<select name="mapel_id" class="form-control" id="exampleFormControlSelect1">
											@foreach ($mapel as $mapel)
											<option value="{{ $mapel->id }}">{{ $mapel->nama }}</option>

											@endforeach
										</select>
									</div>
									<div class="form-group {{ $errors->has('nama')?' has-error':'' }}">
										<label for="exampleInputEmail1">Nama Materi</label>
										<input name="nama" type="text" class="form-control" id="exampleInputEmail1"
											aria-describedby="emailHelp" value="{{ old('nama') }}">
									</div>
									<div class="form-group {{ $errors->has('deskripsi')?' has-error':'' }}">
										<label for="exampleInputEmail1">Deskripsi</label>
										<input name="deskripsi" type="text" class="form-control" id="exampleInputEmail1"
											aria-describedby="emailHelp" value="{{ old('deskripsi') }}">
									</div>
									<div class="form-group {{ $errors->has('link')?' has-error':'' }}">
										<label for="exampleInputEmail1">Link</label>
										<input name="link" type="text" class="form-control" id="exampleInputEmail1"
											aria-describedby="emailHelp" value="{{ old('link') }}">
									</div>
									<div class="form-group {{ $errors->has('file_materi')?' has-error':'' }}">
										<label for="exampleInputEmail1">File Materi</label>
										<input type="file" name="file_materi" class="form-control">
										@if($errors->has('file_materi'))
										<span class="help-block">{{ $errors->first('file_materi') }}</span>
										@endif
									</div>

									<!--TOMBOL BUTTON-->
									<input type="hidden" name="kelas_id" value="{{ $data_kelas->id }}">
									<input type="hidden" name="id_tahun" value="{{ $data_kelas->id_tahun }}">
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary"
											data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Submit</button>
									</div>
								</form>
								@endif

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="panel-body">
			<table class="table table-hover css-serial">

				<thead>
					<tr>
						<th>No</th>

						<th>Nama</th>
						<th>NISN</th>
						<th>Jenis Kelamin</th>
						<th>Tanggal Lahir</th>

					</tr>
				</thead>
				<tbody>

					@foreach($data_kelas->siswa as $key=>$data_siswa)
					<tr>
						<td>{{ ++$key }}</td>

						<td class="text-primary" style="font-weight: bold;">{{ $data_siswa->nama }}</td>
						<td>{{ $data_siswa->nisn }}</td>
						<td>{{ $data_siswa->jenis_kelamin }}</td>
						<td>{{ $data_siswa->tanggal_lahir }}</td>

					</tr>
					@endforeach

				</tbody>
			</table>

		</div>


	</div>
</div>

<div class="container-fluid">
	<div class="row">


		<div class="col-md-6">
			<div class="panel">
				<div class="panel-heading">
					<div class="panel-title">
						Tugas
					</div>
					<div class="panel-body">
						<table class="table table1 table-hover css-serial">

							<thead>
								<tr>

									<th>Pembuat</th>
									<th>Mapel</th>
									<th>Waktu</th>
									<th>Jenis Ujian</th>
									@if(auth()->user()->role=='siswa')
									<th>Aksi</th>
									@endif


								</tr>
							</thead>
							<tbody>

								@foreach($data_kelas->tugas as $tugas)
								<tr>

									<td>{{ $tugas->pembuat }}</td>
									<td>{{ $tugas->mapel->nama }}</td>
									<td>{{ $tugas->waktu }}</td>

									@if ($tugas->jenis_tugas=='Ujian')
									<td class="text-center">
										<span class="label"
											style="background-color: blue;">{{ $tugas->jenis_tugas }}</span>
									</td>
									@else
									<td class="text-center">
										<span class="label label-success">{{ $tugas->jenis_tugas }}</span>
									</td>
									@endif

									@if(auth()->user()->role=='siswa')

									<!--TOMBOL BUTTON-->
									<td>
										@php
										$sudah = \App\TugasSiswa::where('tugas_id', $tugas->id)->where('siswa_id',
										auth()->user()->siswa->id)->first();
										@endphp
										@if($sudah)
										<a href="#" class="btn btn-danger btn-sm">Selesai</a>
										@else
										<a href="/siswa/tugas/{{ $tugas->id }}/takesoal"
											class="btn btn-primary btn-sm">Kerjakan</a>
										@endif

									</td>
									@endif

								</tr>
								@endforeach

							</tbody>
						</table>

					</div>
				</div>

			</div>


		</div>
		<div class="col-md-6">
			<div class="panel">
				<div class="panel-heading">
					<div class="panel-title">
						Materi
						@if (auth()->user()->role=='admin'||auth()->user()->role=='guru')
							<a type="button" class="btn btn-primary navbar-btn-right btn-sm tambah" data-toggle="modal"
								data-target="#exampleModal">
								Tambah Data
							</a>
						@endif
						
					</div>
					<div class="panel-body">
						<table class="table table1 table-hover css-serial">
							<thead>
								<tr>
									<th>Nama Materi</th>
									<th>File Materi</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data_kelas->materi as $data_materi)

								<!--TOMBOL BUTTON-->
								<tr>
									<td>{{ $data_materi->nama }}</td>
									<td>{{ $data_materi->file_materi }}</td>
									<td>
										@if ($data_materi->file_materi==!null)
										<a href="/{{ auth()->user()->role }}/materi/download/{{ $data_materi->file_materi}}"
											class="btn btn-primary btn-sm">Download</a>
										@endif
										@if ($data_materi->link==!null)

										<a href="{{$data_materi->link}}" target="_blank"
											class="btn btn-warning btn-sm">View</a>
										@endif
										{{-- <a href="/{{ auth()->user()->role }}/materi/download/{{ $data_materi->file_materi }}"
										class="btn btn-primary btn-sm">Download</a> --}}
										@if (auth()->user()->role=='admin')
											<a href="/{{ auth()->user()->role }}/materi/{{ $data_materi->id }}/hapus" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Inggin Dihapus ?')">
                                		<i class="fa fa-trash-o"></i> Hapus</a>
										@elseif(auth()->user()->role=='guru')
										<a href="/{{ auth()->user()->role }}/materi/{{ $data_materi->id }}/hapus" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Inggin Dihapus ?')">
                                		<i class="fa fa-trash-o"></i> Hapus</a>
										@endif
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<style>
	.table1 {
		display: block;
		overflow-x: auto;
		white-space: nowrap;
	}
</style>



@endsection