@extends('layouts.masteradmin')

@section('content')
<!-- ini form kelas atas -->
<div class="container-fluid">
	<div class="panel">
		<div class="col-md-6">
			<div class="panel-heading">
				<h3 class="panel-title">Kelas </h3>
			</div>
		</div>
		
		<div class="panel-body">
			
			<table class="table table-bordered">
				
				<thead>
					<tr>
						
						<th>No</th>
						<th>Nama</th>	
						<th>ID</th>	
						<th>NISN</th>
						<th>Jenis Kelamin</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				{{-- @foreach($kelas as $siswa)
				<tr>
				
					<td>{{ ++$key }}</td>
					<td class="text-primary" style="font-weight: bold;">{{ $data_siswa->nama }}</td>
					<td>{{ $data_siswa->id }}</td>
					<td>{{ $data_siswa->nisn }}</td>
					<td>{{ $data_siswa->jenis_kelamin }}</td>
					
				</tr>
				@endforeach --}}
				</tbody>
			</table>
			
		</div>
	
		
	</div>
</div>
@endsection

