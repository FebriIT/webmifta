@extends('layouts.masteradmin')

@section('content')
<div class="container-fluid">
	<div class="panel">
        <div class="panel-heading">
            <div class="panel-title">Pilih Matapelajaran <i>( {{ $siswa->nama }} )</i></div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tugas</th>
                            <th>Aksi</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa->kelas->mapel as $mapel)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $mapel->nama }}</td>
                            
                            <!--TOMBOL BUTTON-->
                            <td> 
                                <a href="/guru/tugas/{{ $siswa->id }}/{{ $mapel->id }}/nilai" class="btn btn-primary btn-sm">Open</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection