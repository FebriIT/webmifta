@extends('layouts.masteradmin')

@section('content')

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
                            <th>No</th>
                            <th>Mapel</th>
                            <th>Keterangan Tugas</th>
                            <th>Nilai</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa->mapel as $mapel)
                        <tr>
                           <td>{{ $loop->iteration }}</td>
                            <td>{{ $mapel->nama }}</td>
                            <td>{{ $mapel->pivot->kettugas }}</td>
                            <td>{{ $mapel->pivot->nilai }}</td>
                            
                           
                        </tr>
                        @endforeach
                        

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection