@extends('layouts.masteradmin')

@section('content')

<div class="container-fluid">
    @if(auth()->user()->role=='admin' || auth()->user()->role=='guru')
	<div class="row searchtambah panel">
		<div class="col-6 search">
			<form class="navbar-form navbar-left" action="/{{ auth()->user()->role }}/materi" method="GET">
				<div class="input-group">
					<input type="text" name="cari" value="" class="form-control" placeholder="Cari Materi...">
					<span class="input-group-btn"><button type="submit" class="btn btn-primary">Go</button></span>
				</div>
			</form>
		</div>
		<div class="col-6 tambah">
			<!-- Button trigger modal -->
            
			<button type="button" class="btn btn-primary navbar-btn-right tambah" data-toggle="modal" data-target="#exampleModal">
				Tambah Data
			</button>
		</div>
    </div>
    
    @endif
</div>

<div class="col-12">
    <div class="panel">
        <div class="col-md-6">
            <div class="panel-heading">
                <h3 class="panel-title">Materi Pembelajaran 
                    
                </h3>
                </div>
        </div>
        <div class="col-md-6">
            
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Tambah Data Materi Pembelajaran</h3>
                            
                        </div>
                        <div class="modal-body">
                            @if (auth()->user()->role=='admin'||auth()->user()->role=='guru')
                                <form action="/{{ auth()->user()->role }}/materi/create" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                
                                <div class="form-group {{ $errors->has('kelas_id')?' has-error':'' }}">
									<label for="exampleInputEmail1">Kelas</label>
									<select name="kelas_id" class="form-control" id="exampleFormControlSelect1">
                                        @foreach ($kelas as $kelas)
                                        <option value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
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
									<input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('nama') }}">
                                </div>
                                <div class="form-group {{ $errors->has('deskripsi')?' has-error':'' }}">
									<label for="exampleInputEmail1">Deskripsi</label>
									<input name="deskripsi" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('deskripsi') }}">
								</div>
                                <div class="form-group {{ $errors->has('link')?' has-error':'' }}">
									<label for="exampleInputEmail1">Link</label>
									<input name="link" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('link') }}">
								</div>
								<div class="form-group {{ $errors->has('file_materi')?' has-error':'' }}">
									<label for="exampleInputEmail1">File Materi</label>
									<input type="file" name="file_materi" class="form-control">
									@if($errors->has('file_materi'))
									<span class="help-block">{{ $errors->first('file_materi') }}</span>
									@endif
								</div>

                                <!--TOMBOL BUTTON-->
                                <input type="text" name="id_tahun" value="{{ $id }}" hidden>
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
                        
                        <th>No</th>
                        <th>Nama Materi</th>
                        <th>Mata Pelajaran</th>
                        <th>Kelas</th>
                        <th>Link</th>
                        <th>file Materi</th>
                        <th>Author</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data_materi as $key=>$materi)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $materi->nama }}</td>
                        <td>{{ $materi->mapel->nama }}</td>
                        <td>{{$materi->kelas->nama}}</td>
                        <td>{{ $materi->link }}</td>
                        <td>{{ $materi->file_materi }}</td>
                        <td>{{ $materi->author }}</td>

                        @if(auth()->user()->role=='admin')
                        <!--TOMBOL BUTTON-->
                        <td>
                            @if ($materi->file_materi==!null)
                            <a href="/guru/materi/download/{{ $materi->file_materi }}" class="btn btn-primary btn-sm">Download</a>
                            @endif
                            @if ($materi->link==!null)
                                
                            <a href="{{$materi->link}}" target="_blank" class="btn btn-warning btn-sm">View</a>
                            @endif
                            {{-- <a href="/admin/materi/{{ $materi->id }}/view" class="btn btn-warning btn-sm">View</a> --}}
                            <a href="/admin/materi/{{ $materi->id }}/hapus" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Inggin Dihapus ?')">
                                <i class="fa fa-trash-o"></i> Hapus</a>
                        </td>

                        @elseif(auth()->user()->role=='guru')
                        <!--TOMBOL BUTTON-->
                        <td>
                            @if ($materi->file_materi==!null)
                            <a href="/guru/materi/download/{{ $materi->file_materi }}" class="btn btn-primary btn-sm">Download</a>
                            @endif
                            @if ($materi->link==!null)
                                
                            <a href="{{$materi->link}}" target="_blank" class="btn btn-warning btn-sm">View</a>
                            @endif
                            
                            <a href="/guru/materi/{{ $materi->id }}/hapus" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Inggin Dihapus ?')">
                                <i class="fa fa-trash-o"></i> Hapus</a>
                        </td>

                        @elseif(auth()->user()->role=='siswa')
                        <!--TOMBOL BUTTON-->
                        <td>
                            @if ($materi->file_materi==!null)
                            <a href="/siswa/materi/download/{{ $materi->file_materi }}" class="btn btn-primary btn-sm">Download</a>
                            @endif
                            @if ($materi->link==!null)
                                
                            <a href="{{$materi->link}}" target="_blank" class="btn btn-warning btn-sm">View</a>
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

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<div class="panel">
				<div class="panel-heading">
					<div class="panel-title">
						Data Tahun Akademik {{ $tahun->tahun }}
					</div>
					<div class="panel-body">
                        
                        @if ($data_materi->count()==0)
                            <p>Jumlah Materi : 0</p>
                        @else
                            <p>Jumlah Materi : {{ $data_materi->count() }}</p>
                        @endif
                        
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
