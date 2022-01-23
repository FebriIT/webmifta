@extends('layouts.masteradmin')

@section('content')

<div class="col-md-6">
    <div class="container-fluid">
        <div class="row">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title">Profile Siswa</div>
                        Nama : {{$siswa->nama}} <br>
                        Kelas : {{$siswa->kelas->nama}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="container-fluid">
        <div class="row">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title">Hasil yang didapat</div>
                        <div class="xadexfont">Total : {{$score+$scoreessay}} </div>
                        
                        <style>
                            .xadexfont{
                                font-size: 20px;
                                font-weight: bold;
                                color: blue;
                            }
                        </style>
                        
                        {{-- <div class="panel">
                            <a href="/guru/kelas/{{$siswa->id}}/nilaisiswa" class="btn btn-primary btn-sm  navbar-btn-right">Input Hasil Nilai Siswa</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        
        <div class="panel col-md-12">
            <div class="panel-heading">
                <div class="panel-title">Hasil Soal Pilihan Ganda </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th> 
                                <th>Soal</th>
                                <th>Jawaban</th>
                                <th>Status</th>
                                <th>Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $tugas)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td >{{$tugas->nama}}</td>
                                <td>{{ $tugas->soal }}</td>
                                
                                <td>{{ $tugas->jawaban }}</td>
                                    
                                @if ($tugas->status=='benar')
                                <td> <span class="label label-success">{{ $tugas->status }}</span></td>
                                @else
                                <td><span class="label label-danger">{{ $tugas->status }}</span></td>
                                @endif
                                <td><b>{{ $tugas->score }}</b></td>
                            </tr>
                            
                            @endforeach
                            
                        </tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b> Hasil : </b></td>
                            <td><b>{{$score}} </b></td>
                        </tr>
                    </table>
                </div>

                {{-- esaayyyyyyyy --}}
                <div class="panel-title">Hasil Essay </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th> 
                               
                                <th>Jawaban</th>
                                <th>Score</th>
                                
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataessay as $jwb)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                               <td>{{$jwb->nama}}</td>
                                <td>{{ $jwb->jawaban }}</td>
                                <td><b>{{$jwb->score}}</b></td>
                                <td>

                                    <form action="/guru/tugas/hasilsiswa/{{$jwb->id}}/tambah" method="POST">
                                        {{ csrf_field() }}
                                        
                                            <input name="score" type="number" class="form-control input-sm" placeholder="input nilai" >
                                    </form>
                                    
                                </td>
                               
                            </tr>
                            
                            @endforeach
                            
                        </tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            
                            
                            <td><b> Hasil :</b></td>
                            <td><b>{{$scoreessay}}</b></td>
                        </tr>
                    </table>
                    
                </div>
            </div>
            </div>
            
        </div>
        {{-- <div class="panel col-md-12">
            <div class="panel-heading">
                <div class="panel-title">Hasil Essay </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th> 
                               
                                <th>Jawaban</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataessay as $jwb)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                               <td>{{$jwb->nama}}</td>
                                <td>{{ $jwb->jawaban }}</td>
                               
                            </tr>
                            
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}
    </div>
    
	
    
</div>

@endsection