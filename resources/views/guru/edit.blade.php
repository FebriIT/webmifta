@extends('layouts.masteradmin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title">Edit Data ( {{ $guru->nama }} )</div>
                </div>
                <div class="panel-body">
                    <form action="/admin/guru/{{ $guru->id }}/update" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
            
                        <div class="form-group">
                            <label for="exampleInputEmail1">NIP</label>
                            <input  type="text" class="form-control" id="exampleInputEmail1" disabled aria-describedby="emailHelp" placeholder="NIP" value="{{ $guru->nip }}" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama" value="{{ $guru->nama }}" required>
                        </div>

                        <div class="form-group {{ $errors->has('mapel')?' has-error':'' }}">
                            <label for="exampleInputEmail1">Mapel</label>
                            <select name="mapel" class="form-control" id="exampleFormControlSelect1" required>
                                @foreach ($mapel as $mapel)
                                <option value="{{ $mapel->nama }}">{{ $mapel->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1" required>
                                <option value="Laki-Laki" @if($guru->jenis_kelamin=='Laki-Laki') selected @endif>Laki-Laki</option>
                                <option value="Perempuan" @if($guru->jenis_kelamin=='Perempuan') selected @endif>Perempuan</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">No HP</label>
                            <input name="tempat_lahir" type="text" value="{{ $guru->no_hp }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tempat Lahir" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Lahir</label>
                            <input name="tanggal_lahir" type="date" value="{{ $guru->tanggal_lahir }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Avatar</label>
                            <input type="file" name="avatar" class="form-control">
                        </div>
                        
                        <!--TOMBOL BUTTON-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>



@endsection