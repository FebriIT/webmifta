@extends('layouts.masteradmin')

@section('content')




<!-- Cari dan Tambah -->
<div class="container-fluid">
	<div class="row searchtambah panel">
		<div class="col-6 search">

		<!--TOMBOL BUTTON-->
		@if(auth()->user()->role=='admin')
			<form class="navbar-form navbar-left" action="/admin/siswa" method="GET">
				<div class="input-group">
					<input type="text" name="cari" value="" class="form-control" placeholder="Cari Nama...">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-primary">Go</button>
					</span>
				</div>
			</form>
		@elseif(auth()->user()->role=='guru')
			<form class="navbar-form navbar-left" action="/guru/siswa" method="GET">
				<div class="input-group">
					<input type="text" name="cari" value="" class="form-control" placeholder="Cari Nama...">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-primary">Go</button>
					</span>
				</div>
			</form>
		@endif
		</div>

		<div class="col-6 tambah">
			<!-- TOMBOL BUTTON -->
			<button type="button" class="btn btn-primary navbar-btn-right tambah" data-toggle="modal" data-target="#exampleModal">
				Tambah Data
			</button>
		</div>
	</div>
</div>
<!-- end Cari dan Tambah -->


<div class="col-12">
	<div class="panel">
		<div class="col-md-6">
			<div class="panel-heading">
				<h3 class="panel-title">Data Seluruh Siswa</h3>
			</div>
		</div>
		<!-- Tambah data -->
		<div class="col-md-6">
			
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h3>
						
					</div>
					<div class="modal-body">
						@if(auth()->user()->role=='admin')
							<form action="/admin/siswa/create" method="POST" enctype="multipart/form-data">
								{{ csrf_field() }}

								<div class="form-group {{ $errors->has('nisn')?' has-error':'' }}">
									<label for="exampleInputEmail1">NISN</label>
									<input name="nisn" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NISN" value="{{ old('nisn') }}">
									@if ($errors->any('nisn'))
										<span>{{$errors->first('nisn')}}</span>
									@endif
								</div>

								<div class="form-group {{ $errors->has('nama')?' has-error':'' }}">
									<label for="exampleInputEmail1">Nama</label>
									<input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama" value="{{ old('nama') }}">
								</div>
								
								<div class="form-group {{ $errors->has('kelas_id')?' has-error':'' }}">
									<label for="exampleInputEmail1">Kelas</label>
									<select name="kelas_id" class="form-control" id="exampleFormControlSelect1">
										@foreach($kelas as $datakelas)
											<option value="{{ $datakelas->id }}"> {{ $datakelas->nama }} </option>
										@endforeach
									</select>
								</div>

								<div class="form-group {{ $errors->has('email')?' has-error':'' }}">
									<label for="exampleInputEmail1">Email</label>
									<input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="{{ old('email') }}">
								</div>

								<div class="form-group ">
									<label for="exampleFormControlSelect1">Agama</label>
									<select name="agama" class="form-control" id="exampleFormControlSelect1">
										<option value="Islam"{{ (old('agama')=='Islam')?' selected':'' }}>Islam</option>
										<option value="Kristen"{{ (old('agama')=='Kristen')?' selected':'' }}>Kristen</option>
										<option value="Hindu"{{ (old('agama')=='Hindu')?' selected':'' }}>Hindu</option>
										<option value="Budha"{{ (old('agama')=='Budha')?' selected':'' }}>Budha</option>
										<option value="Khonghucu"{{ (old('agama')=='Khonghucu')?' selected':'' }}>Khonghucu</option>
									</select>
								</div>
								<div class="form-group ">
									<label for="exampleFormControlSelect1">Jenis Kelamin</label>
									<select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
										<option value="Laki-Laki"{{ (old('jenis_kelamin')=='Laki-Laki')?' selected':'' }}>Laki-Laki</option>
										<option value="Perempuan"{{ (old('jenis_kelamin')=='Perempuan')?' selected':'' }}>Perempuan</option>
									</select>
								</div>
								<div class="form-group {{ $errors->has('tempat_lahir')?' has-error':'' }}">
									<label for="exampleInputEmail1">Tempat Lahir</label>
									<input name="tempat_lahir" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tempat Lahir" value="{{ old('tempat_lahir') }}">
								</div>
								<div class="form-group {{ $errors->has('tanggal_lahir')?' has-error':'' }}">
									<label for="exampleInputEmail1">Tanggal Lahir</label>
									<input name="tanggal_lahir" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('tanggal_lahir') }}">
								</div>
								<input type="text" value="{{ $id }}" name="id_tahun" hidden>
								
								<div class="form-group {{ $errors->has('avatar')?' has-error':'' }}">
									<label for="exampleInputEmail1">Avatar</label>
									<input type="file" name="avatar" class="form-control">
									@if($errors->has('avatar'))
									<span class="help-block">{{ $errors->first('avatar') }}</span>
									@endif
								</div>

								<!---TOMBOL BUTTON-->
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</form>
							
						@elseif(auth()->user()->role=='guru')
						<form action="/guru/siswa/create" method="POST" enctype="multipart/form-data">
							{{ csrf_field() }}

							<div class="form-group {{ $errors->has('nisn')?' has-error':'' }}">
								<label for="exampleInputEmail1">NISN</label>
								<input name="nisn" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NISN" value="{{ old('nisn') }}">
								
							</div>

							<div class="form-group {{ $errors->has('nama')?' has-error':'' }}">
								<label for="exampleInputEmail1">Nama</label>
								<input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama" value="{{ old('nama') }}">
							</div>
							
							<div class="form-group {{ $errors->has('kelas_id')?' has-error':'' }}">
								<label for="exampleInputEmail1">Kelas</label>
								<select name="kelas_id" class="form-control" id="exampleFormControlSelect1">
									@foreach($kelas as $datakelas)
										<option value="{{ $datakelas->id }}"> {{ $datakelas->nama }} </option>
									@endforeach
								</select>
							</div>

							<div class="form-group {{ $errors->has('email')?' has-error':'' }}">
								<label for="exampleInputEmail1">Email</label>
								<input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="{{ old('email') }}">
							</div>

							<div class="form-group ">
								<label for="exampleFormControlSelect1">Agama</label>
								<select name="agama" class="form-control" id="exampleFormControlSelect1">
									<option value="Islam"{{ (old('agama')=='Islam')?' selected':'' }}>Islam</option>
									<option value="Kristen"{{ (old('agama')=='Kristen')?' selected':'' }}>Kristen</option>
									<option value="Hindu"{{ (old('agama')=='Hindu')?' selected':'' }}>Hindu</option>
									<option value="Budha"{{ (old('agama')=='Budha')?' selected':'' }}>Budha</option>
									<option value="Khonghucu"{{ (old('agama')=='Khonghucu')?' selected':'' }}>Khonghucu</option>
								</select>
							</div>
							<div class="form-group ">
								<label for="exampleFormControlSelect1">Jenis Kelamin</label>
								<select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
									<option value="Laki-Laki"{{ (old('jenis_kelamin')=='Laki-Laki')?' selected':'' }}>Laki-Laki</option>
									<option value="Perempuan"{{ (old('jenis_kelamin')=='Perempuan')?' selected':'' }}>Perempuan</option>
								</select>
							</div>
							<div class="form-group {{ $errors->has('tempat_lahir')?' has-error':'' }}">
								<label for="exampleInputEmail1">Tempat Lahir</label>
								<input name="tempat_lahir" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tempat Lahir" value="{{ old('tempat_lahir') }}">
							</div>
							<div class="form-group {{ $errors->has('tanggal_lahir')?' has-error':'' }}">
								<label for="exampleInputEmail1">Tanggal Lahir</label>
								<input name="tanggal_lahir" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('tanggal_lahir') }}">
							</div>
							<div class="form-group {{ $errors->has('avatar')?' has-error':'' }}">
								<label for="exampleInputEmail1">Avatar</label>
								<input type="file" name="avatar" class="form-control">
								@if($errors->has('avatar'))
								<span class="help-block">{{ $errors->first('avatar') }}</span>
								@endif
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
		</div>
		<!-- end Tambah data -->
		
		<div class="panel-body">
			<table class="table table-hover css-serial">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>NISN</th>
						<th>Kelas</th>
						<th>Jenis Kelamin</th>
							
						
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@php
						$i=$data_siswa->perPage()*($data_siswa->currentPage()-1);
						$i++
					@endphp
					@foreach($data_siswa as $siswa)
					<tr>
						<td>{{ $i++ }}</td>
						<td class="text-primary" style="font-weight: bold;"><a href="/siswa/{{ $siswa->id }}/profile">{{ $siswa->nama }}</a></td>
						<td>{{ $siswa->nisn }}</td>
						<td>{{ $siswa->kelas->nama }}</td>
						<td>{{ $siswa->jenis_kelamin }}</td>
						
						<!--TOMBOL BUTTON-->
						<td>
						@if(auth()->user()->role=='admin')
							<a href="/admin/siswa/{{ $siswa->id }}/edit" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>
							<a href="/admin/siswa/{{ $siswa->id }}/hapus" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Inggin Dihapus ?')">
								<i class="fa fa-trash-o"></i> Hapus</a>
						@elseif(auth()->user()->role=='guru')
							<a href="/guru/siswa/{{ $siswa->id }}/edit" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>
							<a href="/guru/siswa/{{ $siswa->id }}/hapus" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Inggin Dihapus ?')">
								<i class="fa fa-trash-o"></i> Hapus</a>
						@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{ $data_siswa->links() }}

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
						<p>Halaman : {{ $data_siswa->currentPage() }}</p>
						@if( $data_siswa->count()==0 )
							<p> Jumlah Data      :  0  </p>	
						@else
							<p> Jumlah Data      :  {{ $data_siswa->count()}} </p>
						@endif
						
						
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>


@endsection