@extends('layouts.masteradmin')

@section('content')

<div class="container-fluid">
    
	<div class="row">
		<div class="col-12">
            <div class="panel">
                <div class="panel-heading col-md-4">
                    <h3 class="panel-title text-center">Materi : {{ $data_materi->mapel->nama }}</h3>
                </div>
                <div class="panel-heading col-md-4">
                    <h4 class="panel-title text-center">{{ $data_materi->file_materi }}</h4>
                </div>
                <div class="panel-heading col-md-4">
                    <h3 class="panel-title text-center">Kelas : {{ $data_materi->kelas->nama }}</h3>
                </div>
                <div class="panel-body text-center">
                    <p><iframe src="{{ url('materi/'.$data_materi->file_materi) }}" style="width:900px; height:600px;"></iframe></p>
                </div>
            </div>
            <div class="panel">
                <div class="panel-body">
                    <h3>Deskripsi : {{ $data_materi->deskripsi }}</h3>
                    

                </div>
            </div>
            
            
        </div>
    </div>
</div>

@stop