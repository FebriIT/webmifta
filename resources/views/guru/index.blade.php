@extends('layouts.masteradmin')

@section('content')
<!-- search and bottom tambah -->
<div class="container-fluid">
	<div class="row searchtambah panel">
		<div class="col-6 search">
			<form class="navbar-form navbar-left" action="/admin/guru" method="GET">
				<div class="input-group">
					<input type="text" name="cari" value="" class="form-control" placeholder="Cari Nama...">
					<span class="input-group-btn"><button type="submit" class="btn btn-primary">Go</button></span>
				</div>
			</form>
		</div>
		
		<!--TOMBOL BUTTON-->
		<div class="col-6 tambah">
			<button type="button" class="btn btn-primary navbar-btn-right tambah" data-toggle="modal" data-target="#exampleModal">
				Tambah Data
			</button>
		</div>
	</div>
</div>
<!-- end search and bottom tambah -->

<!-- tambah data and data-guru -->
<div class="col-12">
	<div class="panel">
		<div class="col-md-6">
			<div class="panel-heading">
				<h3 class="panel-title">Data Guru</h3>
				
			</div>
		</div>
		<div class="col-md-6">
			<!-- Tambah data guru-->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">

						<!--TOMBOL BUTTON-->
						<div class="modal-header">
							<h3 class="modal-title" id="exampleModalLabel">Tambah Data Guru</h3>
						</div>
						
						<div class="modal-body">
							@if(auth()->user()->role=='admin')
								<form action="/admin/guru/create" method="POST" enctype="multipart/form-data">
									{{ csrf_field() }}

									<div class="form-group {{ $errors->has('nip')?' has-error':'' }}">
										<label for="exampleInputEmail1">NIP</label>
										<input name="nip" type="number" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp" placeholder="Nomor Induk Pegawai" value="{{ old('nip') }}">
										@if ($errors->any('nip'))
											<span>{{$errors->first('nip')}}</span>
										@endif
									</div>

									<div class="form-group {{ $errors->has('nama')?' has-error':'' }}">
										<label for="exampleInputEmail1">Nama</label>
										<input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama" value="{{ old('nama') }}" required>
										
									</div>
									<div class="form-group {{ $errors->has('mapel')?' has-error':'' }}">
										<label for="exampleInputEmail1">Mapel</label>
										<select name="mapel" class="form-control" id="exampleFormControlSelect1" required>
											@foreach ($mapel as $mapel)
											<option value="{{ $mapel->nama }}">{{ $mapel->nama }}</option>
											@endforeach
										</select>
									</div>
									{{-- <div class="form-group {{ $errors->has('mapel')?' has-error':'' }}">
										<label for="exampleInputEmail1">Kelas</label>
										<select name="kelas_id" class="form-control" id="exampleFormControlSelect1" required>
											@foreach ($kelas as $kelas)
											<option value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
											@endforeach
										</select>
									</div> --}}
									<div class="form-group">
										<label for="exampleInputEmail1">Kelas</label>
										@foreach ($kelas as $kelas)
										<label class="fancy-checkbox">
											<input type="checkbox" name="kelas[]" value="{{ $kelas->id }}">
											<span>{{ $kelas->nama }}</span>
										</label>
										@endforeach
									</div>
									
									

									<div class="form-group {{ $errors->has('no_hp')?' has-error':'' }}">
										<label for="exampleInputEmail1">Nomor HP</label>
										<input name="no_hp" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nomor HP" value="{{ old('no_hp') }}" required>
										
									</div>
									<div class="form-group {{ $errors->has('email')?' has-error':'' }}">
										<label for="exampleInputEmail1">Email</label>
										<input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="{{ old('email') }}" required>
										
									</div>

									<div class="form-group">
										<label for="exampleFormControlSelect1">Jenis Kelamin</label>
										<select class="form-control" name="jenis_kelamin" id="exampleFormControlSelect1" required>
											<option value="Laki-Laki"{{ (old('status')=='L')?' selected':'' }}>Laki-Laki</option>
											<option value="Perempuan"{{ (old('status')=='P')?' selected':'' }}>Perempuan</option>
											
										</select>
									</div>

									<div class="form-group {{ $errors->has('tanggal_lahir')?' has-error':'' }}">
										<label for="exampleInputEmail1">Tanggal Lahir</label>
										<input name="tanggal_lahir" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('tanggal_lahir') }}" required>
										
									</div>
									
									<!--TOMBOL BUTTON-->
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
			<!-- end Tambah data -->
			
		</div>
		

		<!-- data-guru -->
		<div class="panel-body">
			<table class="table table-hover css-serial">
				<thead>
					<tr>
						<th>Nomor</th>
						<th>NIP</th>
						<th>Nama</th>
						<th>Mapel</th>
						<th>Jenis Kelamin</th>
						<th>Nomor HP</th>
						<th>Tanggal Lahir</th>	
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data_guru as $guru)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $guru->nip }}</td>
						<td class="text-primary" style="font-weight: bold;">{{ $guru->nama }}</td>
						<td>{{ $guru->mapel }}</td>
						<td>{{ $guru->jenis_kelamin }}</td>
						<td>{{ $guru->no_hp }}</td>
						<td>{{ $guru->tanggal_lahir }}</td>
						
						<!--TOMBOL BUTTON-->
						<td>
							<a href="/admin/guru/{{ $guru->id }}/edit" class="btn btn-warning btn-sm" ><i class="glyphicon glyphicon-edit"></i> Edit</a>
							<a href="/admin/guru/{{ $guru->id }}/hapus" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Inggin Dihapus ?')">
								<i class="fa fa-trash-o"></i> Hapus</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<!-- end data-guru -->
	</div>
</div>
<!-- end tambah data and data-guru -->

<!-- penjumlahan -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<div class="panel">
				<div class="panel-heading">
					<div class="panel-title">
						Data
					</div>
					<div class="panel-body">
						<p>Halaman : {{ $data_guru->currentPage() }}</p>
						@if($data_guru->count()==0)
							<p>Jumlah Data : 0</p> 
						@else
							<p>Jumlah Data : {{ $data_guru->count() }}</p> 
						@endif
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end penjumlahan -->


@endsection