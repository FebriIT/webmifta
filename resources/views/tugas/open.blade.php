@extends('layouts.masteradmin')

@section('content')


<h3 class="page-title"><i class="fa fa-database"> Data Tugas</i></h3>
<div class="container-fluid">



	{{-- BARIS 1 --}}
	<div class="row">
		<div class="col-md-4">
			<div class="panel">
				<!-- Modal -->
				<div class="modal fade" id="edittopik" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title" id="exampleModalLabel">Edit Data Topik</h3>
							
						</div>
						<div class="modal-body">
							
							<form action="/{{ auth()->user()->role }}/tugas/{{ $tugas->id }}/edit" method="POST">
								{{ csrf_field() }}

								
								
								
								<div class="form-group {{ $errors->has('mapel_id')?' has-error':'' }}">
									<label for="exampleFormControlSelect1">Mapel</label>
									<select name="mapel_id" class="form-control" id="exampleFormControlSelect1">
										@foreach ($mapel as $mapel)
										<option value="{{ $mapel->id}}"@if($tugas->mapel_id==$mapel->id) selected @endif >{{ $mapel->nama }}</option>
										
									@endforeach
									</select>
								</div>
								
								
								<div class="form-group {{ $errors->has('jenis_tugas')?' has-error':'' }}">
									<label for="exampleFormControlSelect1">Jenis Tugas</label>
									<select name="jenis_tugas" class="form-control" id="exampleFormControlSelect1">
										<option value="Latihan" @if($tugas->jenis_tugas=='Latihan')selected @endif>Latihan</option>
										<option value="Ujian" @if($tugas->jenis_tugas=='Ujian') selected @endif>Ujian</option>
									</select>
								</div>
								
								<div class="form-group">
									<label for="exampleInputEmail1">Waktu</label>
									<input value="{{ $tugas->waktu }}" name="waktu" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kelas">
								</div>
								
								
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-warning">Simpan</button>
								</div>
							</form>
						</div>
						
					</div>
					</div>
				</div>
				{{-- end modal --}}
				<div class="panel-heading">
					<div class="panel-title">Informasi</div>
					<div class="right">
						<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
					</div>
				</div>
				<div class="panel-body">
					<table class="table table-striped">
						<tbody>
						
							<tr style="color: red;">
								<td>ID Paket</td>
								<td>:</td>
								<td>{{ $tugas->id }}</td>
							</tr>
							<tr>
								<td>Mapel</td>
								<td>:</td>
								<td>{{ $tugas->mapel->nama }}</td>
							</tr>
							
							
							<tr>
								<td>Jenis Tugas</td>
								<td>:</td>
								<td>{{ $tugas->jenis_tugas }}</td>
							</tr>

							<tr>
								<td>Waktu</td>
								<td>:</td>
								<td>{{ $tugas->waktu }} Menit</td>
							</tr>
							
						</tbody>
						
					</table>
					<tr>
						<td></td>
						<td></td>
						<td><button type="button" class="btn btn-warning btn-sm navbar-btn-right" data-toggle="modal" data-target="#edittopik">
							Edit
						</button></td>
					</tr>
					
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="panel">
				<!-- Modal -->
				<div class="modal fade" id="tambahsoal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title" id="exampleModalLabel">Tambah Soal Pilihan Ganda</h3>
							
						</div>
						<div class="modal-body">
							
							<form action="/guru/tugas/{{$tugas->id}}/createpilihanganda" method="POST" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="form-group {{ $errors->has('soal')?' has-error':'' }}">
									<label for="exampleInputEmail1">Soal</label>
									<textarea  name="soal" class="form-control" placeholder="Buat Soal" required rows="4"></textarea>
								</div>
								<div class="form-group {{ $errors->has('a')?' has-error':'' }}">
									<label for="exampleInputEmail1">Pilihan A</label>
									<input value="{{ old('a') }}" name="a" type="text" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Buat Pilihan">
								</div>
								<div class="form-group {{ $errors->has('b')?' has-error':'' }}">
									<label for="exampleInputEmail1">Pilihan B</label>
									<input value="{{ old('b') }}" name="b" type="text" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Buat Pilihan">
								</div>
								<div class="form-group {{ $errors->has('c')?' has-error':'' }}">
									<label for="exampleInputEmail1">Pilihan C</label>
									<input value="{{ old('c') }}" name="c" type="text" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Buat Pilihan">
								</div>
								<div class="form-group {{ $errors->has('d')?' has-error':'' }}">
									<label for="exampleInputEmail1">Pilihan D</label>
									<input value="{{ old('d') }}" name="d" type="text" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Buat Pilihan">
								</div>
								<div class="form-group ">
									<label for="exampleFormControlSelect1">Kunci Jawaban</label>
									<select name="kunci" class="form-control" id="exampleFormControlSelect1" required>
										<option value="A"{{ (old('kunci')=='A')?' selected':'' }}>A</option>
										<option value="B"{{ (old('kunci')=='B')?' selected':'' }}>B</option>
										<option value="C"{{ (old('kunci')=='C')?' selected':'' }}>C</option>
										<option value="D"{{ (old('kunci')=='D')?' selected':'' }}>D</option>
										
									</select>
								</div>
								<div class="form-group {{ $errors->has('score')?' has-error':'' }}">
									<label for="exampleInputEmail1">Score</label>
									<input name="score" type="number" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Score" value="{{ old('score') }}">
								</div>
								<div class="form-group {{ $errors->has('gambar')?' has-error':'' }}">
									<label for="exampleInputEmail1">Gambar</label>
									<input type="file" name="gambar" class="form-control" >
									@if($errors->has('gambar'))
									<span class="help-block">{{ $errors->first('gambar') }}</span>
									@endif
								</div>
								
								
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</form>
						</div>
						
					</div>
					</div>
				</div>
				{{-- end modal --}}
				<div class="panel-heading">
					<div class="panel-title">Soal Pilihan Ganda</div>
					<div class="right">
						<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
						
					</div>
				</div>
				<div class="panel-body">
					
					<table class="table table-bordered">
						<thead>
							<tr>
								
								<th>Soal</th>	
								<th>Kunci</th>
								<th>Score</th>
								
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach($tugas->soal as $soal)
								
									<tr>
										<td>{{$soal->soal}}</td>
										<td >{{$soal->kunci}}</td>
										<td>{{ $soal->score }}.00</td>
										<td>
											<a href="/guru/tugas/{{ $soal->id }}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Inggin Dihapus ?')">
												<i class="fa fa-trash-o"></i> Hapus</a>
										</td>
									</tr>
								
							@endforeach
						</tbody>
					</table>
					<tr>
						<td></td>
						<td></td>
						<td><button type="button" class="btn btn-primary btn-sm navbar-btn-right" data-toggle="modal" data-target="#tambahsoal">
							Tambah Soal
						</button></td>
					</tr>
					
				</div>
			</div>
		</div>
	</div>	




	{{-- BARIS 2 --}}
	<div class="row">
		<div class="col-md-4">
			
		</div>
		<div class="col-md-8">
			<div class="panel">
				<!-- Modal -->
				<div class="modal fade" id="tambahsoalessay" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title" id="exampleModalLabel">Tambah Soal Essay</h3>
							
						</div>
						<div class="modal-body">
							
							<form action="/guru/tugas/{{ $tugas->id }}/createessay" method="POST">
								{{ csrf_field() }}

								
								<div class="form-group">
									<label for="exampleInputEmail1">Pertanyaan</label>
									<input name="pertanyaan" type="text" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tulis Pertanyaan...">
								</div>
								<div class="form-group {{ $errors->has('score')?' has-error':'' }}">
									<label for="exampleInputEmail1">Score</label>
									<input name="score" type="number" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Score" value="{{ old('score') }}">
								</div>
								
								
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</form>
						</div>
						
					</div>
					</div>
				</div>
				{{-- end modal --}}
				<div class="panel-heading">
					<div class="panel-title">Soal Essay</div>
					<div class="right">
						<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
						
					</div>
				</div>
				<div class="panel-body">
					
					<table class="table table-bordered">
						<thead>
							<tr>
								
								<th>Soal</th>	
								
								<th>Score</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach($tugas->soalessay as $soals)
								
									<tr>
										<td>{{$soals->pertanyaan}}</td>
										<td>{{ $soals->score }}</td>
										<td>
											<a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Inggin Dihapus ?')">
												<i class="fa fa-trash-o"></i> Hapus</a>
										</td>
									</tr>
								
							@endforeach
						</tbody>
					</table>
					<tr>
						<td></td>
						<td></td>
						<td><button type="button" class="btn btn-primary btn-sm navbar-btn-right" data-toggle="modal" data-target="#tambahsoalessay">
							Tambah Soal
						</button></td>
					</tr>
					
				</div>
			</div>
		</div>
	</div>
</div>


@endsection

