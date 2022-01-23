@extends('layouts.masteradmin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="panel col-md-12">
            <div class="panel-heading">
                <div class="panel-title">Pilih Siswa</div>
               
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama Siswa</th>
                                
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datasiswa as $data)
                            <tr>
                                <td>{{ $data->nama }}</td>
                                
                                
                                <td>
									<a href="/guru/tugas/hasilsiswa/{{ $data->siswa_id }}/{{$tugas->id}}" class="btn btn-primary btn-sm">Open</a>
									<a href="/guru/tugas/hasil/{{ $data->id }}/hapus" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Inggin Dihapus ?')">
										<i class="fa fa-trash-o"></i> Hapus</a>
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

@endsection