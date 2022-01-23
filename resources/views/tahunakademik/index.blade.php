@extends('layouts.masteradmin')

@section('content')

<div class="container-fluid">
    @if(auth()->user()->role=='admin' || auth()->user()->role=='guru')
    <div class="row searchtambah panel">
        <div class="col-6 search">
            <form class="navbar-form navbar-left" action="/{{ auth()->user()->role }}/materi" method="GET">
                <div class="input-group">
                    <input type="text" name="cari" value="" class="form-control" placeholder="Cari Tahun...">
                    <span class="input-group-btn"><button type="submit" class="btn btn-primary">Go</button></span>
                </div>
            </form>
        </div>
        <div class="col-6 tambah">
            <!-- Button trigger modal -->

            <button type="button" class="btn btn-primary navbar-btn-right tambah" data-toggle="modal"
                data-target="#exampleModal">
                Tambah Data
            </button>
        </div>
    </div>

    @endif
</div>

<div class="col-12">
    <div class="panel">
        <div class="col-md-6">
            <div class="panel-heading">
                <h3 class="panel-title">Tahun Akademik

                </h3>
            </div>
        </div>
        <div class="col-md-6">


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Tambah Tahun</h3>

                        </div>
                        <div class="modal-body">

                            <form action="/admin/tahunakademik/create" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}


                                <div class="form-group {{ $errors->has('tahun')?' has-error':'' }}">
                                    <label for="exampleInputEmail1">Tahun</label>
                                    <input name="tahun" type="number" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" required value="{{ old('tahun') }}">
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


                        <th>Tahun</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key=>$datas)
                    <tr>

                        <td>{{ $datas->tahun }}</td>
                        <td>{{ $datas->created_at->format('d-M-Y') }}</td>


                        @if(auth()->user()->role=='admin')
                        <td>
                            <a href="/admin/tahunakademik/{{ $datas->id }}/hapus" class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah Anda Yakin Inggin Dihapus ?')">
                                <i class="fa fa-trash-o"></i> Hapus</a>

                        </td>

                        @endif

                    </tr>
                    @endforeach
                </tbody>


            </table>
        </div>
    </div>
</div>
{{-- 
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<div class="panel">
				<div class="panel-heading">
					<div class="panel-title">
						Data
					</div>
					<div class="panel-body">
                        
                        @if ($data_materi->count()==0)
                            <p>Jumlah Materi : 0</p>
                        @else
                            <p>Jumlah Materi : {{ $data_materi->count() }}</p>
@endif

</div>
</div>
</div>
</div>
</div>
</div> --}}

@endsection