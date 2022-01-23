@extends('layouts.masteradmin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title">Edit Data ( {{ $siswa->nama }} )</div>
                </div>
                <div class="panel-body">
                    <form action="/admin/siswa/{{ $siswa->id }}/update" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
            
                        <div class="form-group">
                            <label for="exampleInputEmail1">NISN</label>
                            <input type="text" class="form-control" disabled id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NISN" value="{{ $siswa->nisn }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama" value="{{ $siswa->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Agama</label>
                            <select name="agama" class="form-control" id="exampleFormControlSelect1">
                                <option value="Islam" @if($siswa->agama=='Islam') selected @endif>Islam</option>
                                <option value="Kristen" @if($siswa->agama=='Kristen') selected @endif>Kristen</option>
                                <option value="Hindu" @if($siswa->agama=='Hindu') selected @endif>Hindu</option>
                                <option value="Budha" @if($siswa->agama=='Budha') selected @endif>Budha</option>
                                <option value="Khonghucu" @if($siswa->agama=='Khonghucu') selected @endif>Khonghucu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kelas</label>
                            <select name="kelas_id" class="form-control" id="exampleFormControlSelect1">
                                @foreach ($kelas as $item)
                                    <option value="{{ $item->id }}" @if($item->id==$siswa->kelas_id) selected @endif>{{ $item->nama }}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                                <option value="Laki-Laki" @if($siswa->jenis_kelamin=='Laki-Laki') selected @endif>Laki-Laki</option>
                                <option value="Perempuan" @if($siswa->jenis_kelamin=='Perempuan') selected @endif>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tempat Lahir</label>
                            <input name="tempat_lahir" type="text" value="{{ $siswa->tempat_lahir }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tempat Lahir">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Lahir</label>
                            <input name="tanggal_lahir" type="date" value="{{ $siswa->tanggal_lahir }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Avatar</label>
                            <input type="file" name="avatar" class="form-control">
                        </div>
                        
                        <!--TOMBOL BUTTTON-->
                        <div class="modal-footer">
                            <button onclick="goBack()" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

	

<script>
function goBack() {
  window.history.back();
}
</script>
@endsection