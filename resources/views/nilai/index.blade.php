@extends('layouts.masteradmin')

@section('content')

@if (auth()->user()->role=='siswa')
<div class="col-md-12">
    <div class="container-fluid">
        <div class="row panel">
            <div class="panel-heading">
                <div class="panel-title">Nilai {{$siswa->nama}}</div>
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
                         
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa->nilai as $datas)
						
						<tr>
                          
                            <td>{{ $datas->mapel->nama }}</td>
                            <td>{{ $datas->tugas1 }}</td>
							<td>{{ $datas->tugas2 }}</td>
							<td>{{ $datas->tugas3 }}</td>
							<td>{{ $datas->tugas4 }}</td>
							<td>{{ $datas->tugas5 }}</td>
							<td>{{ $datas->tugas6 }}</td>
							<td>{{ $datas->uts }}</td>
							<td>{{ $datas->uas}}</td>
                            
                            
                           
                        </tr>
						

						
                        @endforeach
                        

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>







@else
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
		@if (auth()->user()->role=='admin' || auth()->user()->role=='guru')
		<div class="col-6 tambah">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
				Tambah Data NIlai
			</button>
		</div>
		@endif
		
	</div>
	
</div>

<!-- Modal tambah data nilai -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Tambah Data Nilai</h3>
            
        </div>
        <div class="modal-body">
           
            <form action="/{{ auth()->user()->role }}/kelas/nilai/tambahdata" method="POST">
                {{ csrf_field() }}

                
                
                <div class="form-group">
                    <label for="exampleInputEmail1">Siswa : {{ $siswa->nama }}</label>
                    
                </div>
                <div class="form-group {{ $errors->has('mapel_id')?' has-error':'' }}">
					<label for="exampleInputEmail1">Mapel</label>
					<select name="mapel_id" class="form-control" id="exampleFormControlSelect1">
						@foreach($mapel as $data)
							<option value="{{ $data->id }}"> {{ $data->nama }} </option>
						@endforeach
					</select>
				</div>
                <div class="form-group">
                    
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
                
                
                <!-- TOMBOL BUTTON-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        
    </div>
    </div>
</div>

<!-- Modal input nilai -->

		
<!-- end Cari dan Tambah -->
<div class="col-md-12">
    <div class="container-fluid">
        <div class="row panel">
            <div class="panel-heading">
                <div class="panel-title">Nilai {{$siswa->nama}}</div>
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
                        @foreach ($siswa->nilai as $datas)
						@if (auth()->user()->role=='guru')
							
						
							@if(auth()->user()->guru->mapel->nama==$datas->mapel->nama)
							<tr>
							
								<td>{{ $datas->mapel->nama }}</td>
								<td>{{ $datas->tugas1 }}</td>
								<td>{{ $datas->tugas2 }}</td>
								<td>{{ $datas->tugas3 }}</td>
								<td>{{ $datas->tugas4 }}</td>
								<td>{{ $datas->tugas5 }}</td>
								<td>{{ $datas->tugas6 }}</td>
								<td>{{ $datas->uts }}</td>
								<td>{{ $datas->uas}}</td>
								
								<!--TOMBOL BUTTON-->
								<td>
										<a href="/guru/nilaisiswa/{{ $datas->id }}/edit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#inputnilai">Input Nilai</a>
									
									@if (auth()->user()->role=='admin')
										
										<a href="/admin/nilaisiswa/{{ $datas->id }}/hapus" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin ingin dihapus ?')"><i class="fa fa-trash-o"></i>Hapus</a>
									@endif
									
								</td>
							
							</tr>
							@endif
						@elseif(auth()->user()->role=='admin')
						<tr>
                          
                            <td>{{ $datas->mapel->nama }}</td>
                            <td>{{ $datas->tugas1 }}</td>
							<td>{{ $datas->tugas2 }}</td>
							<td>{{ $datas->tugas3 }}</td>
							<td>{{ $datas->tugas4 }}</td>
							<td>{{ $datas->tugas5 }}</td>
							<td>{{ $datas->tugas6 }}</td>
							<td>{{ $datas->uts }}</td>
							<td>{{ $datas->uas}}</td>
                            
                            <!--TOMBOL BUTTON-->
							<td>
                                	<a href="/guru/nilaisiswa/{{ $datas->id }}/edit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#inputnilai">Input Nilai</a>
								
								@if (auth()->user()->role=='admin')
									
                                	<a href="/admin/nilaisiswa/{{ $datas->id }}/hapus" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin ingin dihapus ?')"><i class="fa fa-trash-o"></i>Hapus</a>
								@endif
                                
                            </td>
                           
                        </tr>
						@endif

						<div class="modal fade" id="inputnilai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h3 class="modal-title" id="exampleModalLabel">Input Nilai</h3>
									
								</div>
								<div class="modal-body">
								   
									@if(auth()->user()->role=='guru')
										<form action="/guru/kelas/{{$datas->id}}/update" method="POST">
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
												<input name="tugas1" value="{{$datas->tugas1}}" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nilai Siswa...">
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Tugas 2</label>
												<input name="tugas2" value="{{$datas->tugas2}}" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nilai Siswa...">
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Tugas 3</label>
												<input name="tugas3" value="{{$datas->tugas3}}" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nilai Siswa...">
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Tugas 4</label>
												<input name="tugas4" value="{{$datas->tugas4}}" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nilai Siswa...">
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Tugas 5</label>
												<input name="tugas5" value="{{$datas->tugas5}}" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nilai Siswa...">
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Tugas 6</label>
												<input name="tugas6" value="{{$datas->tugas6}}" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nilai Siswa...">
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">UTS</label>
												<input name="uts" value="{{$datas->uts}}" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nilai Siswa...">
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">UAS</label>
												<input name="uas" value="{{$datas->uas}}" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nilai Siswa...">
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
                        @endforeach
                        

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endif





@endsection