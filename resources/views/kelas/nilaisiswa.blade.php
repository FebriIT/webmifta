@extends('layouts.masteradmin')

@section('content')
<!-- Cari dan Tambah -->
<div class="container-fluid">
	
	<div class="row searchtambah panel">
		<div class="col-6 search">
			<form class="navbar-form navbar-left" action="/guru/kelas" method="GET">
				<div class="input-group">
					<input type="text" name="cari" value="" class="form-control" placeholder="Cari Kelas...">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-primary">Go</button>
					</span>
				</div>
			</form>
		</div>
		<div class="col-6 tambah">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary navbar-btn-right tambah" data-toggle="modal" data-target="#exampleModal">
				Tambah Data Nilai
			</button>
		</div>
	</div>
	
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Tambah Data Nilai</h3>
            
        </div>
        <div class="modal-body">
           
            <form action="/guru/kelas/nilai" method="POST">
                {{ csrf_field() }}

                
                <div class="form-group">
                    <label for="exampleInputEmail1">Mata Pelajaran : {{ auth()->user()->guru->mapel->nama }}</label>
                  
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Siswa : {{ $siswa->nama }}</label>
                    
                </div>
                
                <div class="form-group">
                    <input name="mapel_id" value="{{ auth()->user()->guru->mapel->id }}"  type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mata Pelajaran">
                    <input name="siswa_id" value="{{ $siswa->id }}"  type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Siswa">
                </div>
                
                <div class="form-group">
                    <label for="exampleInputEmail1">Tugas 1</label>
                    <input name="tugas1" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nilai Siswa...">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tugas 2</label>
                    <input name="tugas2" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nilai Siswa...">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tugas 3</label>
                    <input name="tugas3" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nilai Siswa...">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tugas 4</label>
                    <input name="tugas4" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nilai Siswa...">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tugas 5</label>
                    <input name="tugas5" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nilai Siswa...">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tugas 6</label>
                    <input name="tugas6" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nilai Siswa...">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">UTS</label>
                    <input name="uts" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nilai Siswa...">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">UAS</label>
                    <input name="uas" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nilai Siswa...">
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
		
<!-- end Cari dan Tambah -->
<div class="col-md-12">
    <div class="container-fluid">
        <div class="row panel">
            <div class="panel-heading">
                <div class="panel-title">Nilai {{ $siswa->nama }}</div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            
                            <th>Mapel</th>
                            
                            <th>Tugas 1</th>
                            <th>Tugas 2</th>
                            <th>Tugas 3</th>
                            <th>Tugas 4</th>
                            <th>Tugas 5</th>
                            <th>Tugas 6</th>
                            <th>UTS</th>
                            <th>UAS</th>
                            <th>Aksi</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa->mapel as $mapel)
                        @if(auth()->user()->guru->mapel->nama==$mapel->nama)
                        <tr>
                          
                            <td>{{ $mapel->nama }}</td>
                            <td>{{ $mapel->pivot->tugas1 }}</td>
                            <td>{{ $mapel->pivot->tugas2 }}</td>
                            <td>{{ $mapel->pivot->tugas3 }}</td>
                            <td>{{ $mapel->pivot->tugas4 }}</td>
                            <td>{{ $mapel->pivot->tugas5 }}</td>
                            <td>{{ $mapel->pivot->tugas6 }}</td>
                            <td>{{ $mapel->pivot->uts }}</td>
                            <td>{{ $mapel->pivot->uas }}</td>

                            <!--TOMBOL BUTTON-->
                            <td>
                                <a href="/guru/nilaisiswa/{{ $mapel->pivot->id }}/edit" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i>Input Nilai Siswa</a>
                                <a href="/guru/nilaisiswa/{{ $mapel->pivot->id }}/hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>Hapus</a>
                                
                            </td>
                           
                        </tr>
                        @endif
                        @endforeach
                        

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection