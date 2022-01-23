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
				<h3 class="panel-title">Jadwal Pelajaran</h3>
				
			</div>
		</div>
		<div class="col-md-6">
			<!-- Tambah data guru-->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">

						<!--TOMBOL BUTTON-->
						<div class="modal-header">
							<h3 class="modal-title" id="exampleModalLabel">Tambah Jadwal</h3>
						</div>
						
						<div class="modal-body">
							
								<form action="/admin/jadwalpelajaran/create" method="POST" enctype="multipart/form-data">
									{{ csrf_field() }}
									
									<div class="form-group">
										<label>Guru </label>
										<div class="input-group">
											<input class="form-control" id="guru_id" name="guru_id"  type="hidden">
											<input class="form-control" id="nameguru" type="text">
											<span class="input-group-btn"><button class="btn btn-primary"  id="btnmodalguru"  type="button">Cari Guru!</button></span>
										</div>
										
									</div>
									<div class="form-group {{ $errors->has('mapel')?' has-error':'' }}">
										<label for="exampleInputEmail1">Mapel</label>
										<input name="mapel" id="mapel" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{ old('mapel') }}" required>
									</div>
									<div class="form-group {{ $errors->has('nama')?' has-error':'' }}">
										<label for="exampleInputEmail1">Kelas</label>
										<select name="kelas_id" class="form-control" id="exampleFormControlSelect1" required>
											<option value="">-Pilih-</option>
											
											@foreach ($kelas as $kelas)
											<option value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
											@endforeach
										</select>
									</div>
									
									<div class="form-group {{ $errors->has('hari')?' has-error':'' }}">
										<label for="exampleInputEmail1">Hari</label>
										<select name="hari" class="form-control" id="exampleFormControlSelect1" required>
											<option value="">-Pilih-</option>
											<option value="Senin">Senin</option>
											<option value="Selasa">Selasa</option>
											<option value="Rabu">Rabu</option>
											<option value="Kamis">Kamis</option>
											<option value="Jumat">Jumat</option>
											<option value="Sabtu">Sabtu</option>
											
										</select>
									</div>

									<div class="form-group {{ $errors->has('nama')?' has-error':'' }}">
										<label for="exampleInputEmail1">Jam Mulai</label>
										<input name="jadwal_mulai" type="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama" value="{{ old('nama') }}" required>
										
									</div>
									<div class="form-group {{ $errors->has('nama')?' has-error':'' }}">
										<label for="exampleInputEmail1">Jam Selesai</label>
										<input name="jadwal_selesai" type="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama" value="{{ old('nama') }}" required>
										
									</div>
									
									
									<!--TOMBOL BUTTON-->
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Submit</button>
									</div>
								</form>
							
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
						<th>No</th>
						<th>Guru</th>
						<th>Kelas</th>
						<th>Mapel</th>
						<th>Hari</th>
						<th>Jam Mulai</th>
						<th>Jam Selesai</th>	
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data as $key=>$row)
					<tr>
						<td>{{ ++$key }}</td>
						<td>{{ $row->guru->nama }}</td>
						<td>{{ $row->kelas->nama }}</td>
						<td>{{ $row->mapel }}</td>
						<td>{{ $row->hari }}</td>
						<td>{{ $row->jadwal_mulai }}</td>
						<td>{{ $row->jadwal_selesai }}</td>
						
						<!--TOMBOL BUTTON-->
						<td>
							
							<a href="/admin/jadwalpelajaran/{{ $row->id }}/hapus" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Inggin Dihapus ?')">
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

<!-- end penjumlahan -->

<div class="modal fade" tabindex="-1" role="dialog" id="modalGuru">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cari Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-sm table-hover" id="cariguru">
                        <thead>
                            <tr>
                                <th>Pict</th>
                                <th scope="col">NIP</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Mapel</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">No HP</th>
                                {{-- <th scope="col">Rak</th> --}}

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($guru as $row1)
                            <tr class="pilihguru" guru_id="{{ $row1->id }}" mapel="{{ $row1->mapel }}" nip="{{ $row1->nip }}" nama="{{ $row1->nama }}">
                                <td  class="py-1">
                                {{-- @if($row1->cover)
                                    <img src="{{asset('storage/coverbuku/'. $row1->cover)}}" alt="image"  width="70px" height="70px" class="rounded-circle mr-1" />
                                @else
                                @endif --}}
								<img src="{{ $row1->getAvatar() }}" alt="image"  width="70px" height="70px" class="rounded-circle mr-1" />

                                </td>
                                <td>{{ $row1->nip }}</td>
                                <td>{{ $row1->nama }}</td>
                                <td>{{ $row1->mapel }}</td>
                                <td>{{ $row1->jenis_kelamin }}</td>
                                <td>{{ $row1->no_hp }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('#cariguru').DataTable();
        $('#btnmodalguru').click(function(){
            $('#modalGuru').modal('show');
            $('.pilihguru').click(function(e){
                var guru_id=$(this).attr('guru_id');
                var mapel=$(this).attr('mapel');
                var nip=$(this).attr('nip');
                var nama=$(this).attr('nama');
                $('#modalGuru').modal('hide');
                $('#guru_id').val(guru_id);
                $('#mapel').val(mapel);
                $('#nameguru').val(nip+' - '+nama);
            });
        });

        
    });
</script>
@endsection