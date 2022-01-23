@extends('layouts.masteradmin')

@section('content')

<div class="container-fluid">
    
	<div class="row searchtambah panel">
		<div class="col-6 search">
			<form class="navbar-form navbar-left" action="/admin/materi" method="GET">
				<div class="input-group">
					<input type="text" name="cari" value="" class="form-control" placeholder="Cari Materi...">
					<span class="input-group-btn"><button type="submit" class="btn btn-primary">Go</button></span>
				</div>
			</form>
		</div>
		<div class="col-6 tambah">
			<!-- Button trigger modal -->
            
			<button type="button" class="btn btn-primary navbar-btn-right tambah" data-toggle="modal" data-target="#exampleModal">
				Tambah Data
			</button>
		</div>
    </div>
    
</div>

<div class="col-12">
    <div class="panel">
        <div class="col-md-6">
            <div class="panel-heading">
                <h3 class="panel-title">Pengumuman
                    
                </h3>
                </div>
        </div>
        <div class="col-md-6">
            
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            
                            <form action="/admin/pengumuman/create" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                
                                <h3 class="modal-title" id="exampleModalLabel">Tambah Data Pengumuman</h3>
                            <div class="form-group {{ $errors->has('pesan')?' has-error':'' }}">
                                <label for="pesan">Pesan</label>
                                <textarea class="form-control" id="pesan" rows="3" name="pesan" placeholder="Pesan.."></textarea>
                                @if($errors->has('pesan'))
                                    <span class="help-block">{{ $errors->first('pesan') }}</span>
                                @endif
                            </div>

                                <!--TOMBOL BUTTON-->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-hover css-serial">
                <thead>
                    <tr>
                        
                        <th>No</th>
                        <th>Pesan</th>
                        
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $key=>$datas)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $datas->pesan }}</td>
                        <td>
                            
                            
                            <a href="/admin/pengumuman/hapus/{{$datas->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Inggin Dihapus ?')">
                                <i class="fa fa-trash-o"></i> Hapus</a>
                        </td>
                        
                        
                    </tr>    
                @endforeach
                
                </tbody>
                
                
            </table>
        </div>
    </div>
</div>


@endsection
