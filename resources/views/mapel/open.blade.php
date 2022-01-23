@extends('layouts.masteradmin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">Tugas</div>
                <div class="right">
                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Tugas</th>	
                            <th>Nama Paket</th>
                            
                            <th>Mapel</th>
                            
                            <th>Jenis Tugas</th>
                            
                            <th>Waktu</th>
                            @if (auth()->user()->role=='guru'||auth()->user()->role=='siswa')
                                
                            <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @if($mapel->tugas->count()==0)
                    </tbody>
                </table>
                <p class="text-center text-muted" style="font-weight: bold;">
                    <i> Tidak ada tugas !!</i>
                </p>
                        @else
                            @foreach($mapel->tugas as $tugas)
                                <tr>
                                    <td>{{$tugas->id}}</td>
                                    <td >{{$tugas->judul}}</td>
                                    
                                    <td>{{ $tugas->mapel->nama }}</td>
                                    
                                        @if ($tugas->jenis_tugas=='Ujian')
                                            <td class="text-center">
                                                <span  class="label" style="background-color: blue;">{{ $tugas->jenis_tugas }}</span>
                                            </td>
                                        @else
                                            <td class="text-center">
                                                <span  class="label label-success">{{ $tugas->jenis_tugas }}</span>
                                            </td>
                                        @endif
                                    
                                    <td>{{ $tugas->waktu }} Menit</td>
                                    
                                    @if(auth()->user()->role=='guru')

                                        <!--TOMBOL BUTTON-->
                                        <td>
                                            <a href="/guru/tugas/{{ $tugas->id }}" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-eye-open"></i> Open</a>
                                            <a href="/guru/tugas/{{ $tugas->id }}/hapus" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Inggin Dihapus ?')">
                                                <i class="fa fa-trash-o"></i> Hapus</a>
                                        </td>
                                        
                                    @elseif(auth()->user()->role=='siswa')
                                        
                                        <!--TOMBOL BUTTON-->
                                        <td>
                                            @php 
                                                $sudah = \App\TugasSiswa::where('tugas_id', $tugas->id)->where('siswa_id', auth()->user()->siswa->id)->first();
                                            @endphp
                                            @if ($sudah)
                                            <a href="#" class="btn btn-danger btn-sm">Selesai</a>
                                            @else
                                            <a href="/siswa/tugas/{{ $tugas->id }}/takesoal" class="btn btn-primary btn-sm">Take {{ $tugas->jenis_tugas }}</a>
                                            @endif
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>
@endsection