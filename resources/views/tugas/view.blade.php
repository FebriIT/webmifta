@extends('layouts.masteradmin')

@section('content')

<div class="container-fluid">
    
	<div class="row">
		<div class="col-12">
            <div class="panel">
                <div class="panel-heading col-md-4">
                    <h3 class="panel-title text-center">Siswa : {{ $tugas->siswa->nama }}</h3>
                </div>
                <div class="panel-heading col-md-4">
                    <h4 class="panel-title text-center">{{ $tugas->jawaban }}</h4>
                </div>
                <div class="panel-heading col-md-4">
                    <h3 class="panel-title text-center">Tugas : {{ $tugas->tugas->judul }}</h3>
                </div>
                <div class="panel-body text-center">
                    <p><iframe src="{{ url('filejawaban/'.$tugas->jawaban) }}" style="width:900px; height:600px;"></iframe></p>
                </div>
            </div>
            
            
            
        </div>
    </div>
</div>

@stop