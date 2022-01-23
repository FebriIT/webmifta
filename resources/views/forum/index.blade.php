@extends('layouts.masteradmin')

@section('content')
<!-- search and bottom tambah -->
<div class="container-fluid">
    
    
    @foreach ($pengumuman as $data)


    <div class="row">
        <div class="panel">
            <div class="panel-body">
                <h4 style="color:red;"> Pengumuman : {{$data->pesan}} </h4>
            </div>
        </div>
    </div>
    @endforeach

    <div class="row">
        {{-- <div class="col-md-6">
          

        </div> --}}
        <!-- TIMELINE -->

        <div class="panel panel-scrolling">
            <div class="panel-heading">
                <h3 class="panel-title">Forum Diskusi <a href="#" class="btn btn-primary navbar-btn-right tambah btn-sm" data-toggle="modal"
                data-target="#exampleModal">
                Add New Post
            </a></h3>

            </div>

            <div class="" style="position: relative; overflow: hidden; width: auto; height: 430px;">
                <div class="panel-body" style="overflow: hidden; width: auto; height: 430px;">
                    <ul class="list-unstyled activity-list">
                        @foreach ($forum as $frm)

                        <li>
                            @if($frm->user->role=='siswa')
                            <img src="{{$frm->user->siswa->getAvatar()}}" alt="Avatar"
                                class="img-circle pull-left avatar">
                            @elseif($frm->user->role=='guru')
                            <img src="{{$frm->user->guru->getAvatar()}}" alt="Avatar"
                                class="img-circle pull-left avatar">
                            @elseif($frm->user->role=='guru')
                            <img src="{{ asset('images/default.jpg') }}" alt="Avatar"
                                class="img-circle pull-left avatar">
                            @else
                            user dihapus
                            @endif
                            <p>
                                @if ($frm->user->role=='siswa')
                                <b style="color:green;">{{$frm->user->siswa->nama}}</b>
                                @elseif($frm->user->role=='guru')
                                <b style="color:blue;">{{$frm->user->guru->nama}}</b>

                                @elseif($frm->user->role=='admin')
                                <b style="color:red;">{{$frm->user->name}}</b>
                                @else
                                <b style="color:red;">user sudah dihapus</b>
                                @endif
                                <br>
                                {{$frm->konten}}
                                <span class="timestamp">{{$frm->created_at->diffForHumans()}}</span></p>
                            @if (auth()->user()->id==$frm->user_id)


                            <span class="timestamp"><a href="#" data-target="#editModal-{{$frm->id}}" data-toggle="modal">edit</a> <b>|</b> <a
                                    href="/{{ auth()->user()->role }}/forum/{{ $frm->id }}/delete">delete</a></span></p>
                            @endif
                        </li>
                        @endforeach
                        <!-- <button type="button" class="btn btn-primary btn-bottom center-block">Load More</button> -->
                </div>
                <div class="slimScrollBar"
                    style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 9px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 292.563px;">
                </div>
                <div class="slimScrollRail"
                    style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">
                </div>
            </div>
        </div>


        <!-- END TIMELINE -->
    </div>
</div>


<!-- Tambah data guru-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Tambah Konten</h3>
            </div>

            <div class="modal-body">
                @if(auth()->user()->role=='siswa')
                <form action="/siswa/forum/create" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group {{ $errors->has('no_hp')?' has-error':'' }}">
                        <input type="hidden" name="kelas_id" value="{{ $id }}">
                        <label for="konten">Konten</label>
                        <textarea class="form-control" id="konten" rows="3" name="konten"
                            placeholder="Konten.."></textarea>
                        @if($errors->has('konten'))
                        <span class="help-block">{{ $errors->first('konten') }}</span>
                        @endif
                    </div>
                    <!--TOMBOL BUTTON-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                @elseif(auth()->user()->role=='guru')
                <form action="/guru/forum/create" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group {{ $errors->has('konten')?' has-error':'' }}">
                        <input type="hidden" name="kelas_id" value="{{ $id }}">
                        <label for="konten">Konten</label>
                        <textarea class="form-control" id="konten" rows="3" name="konten"
                            placeholder="Konten.."></textarea>
                        @if($errors->has('konten'))
                        <span class="help-block">{{ $errors->first('konten') }}</span>
                        @endif
                    </div>
                    
                    <!--TOMBOL BUTTON-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                @endif
            </div>

        </div>
    </div>
</div>
<!-- end Tambah data -->



@foreach ($forum as $fbi )
<div class="modal fade" id="editModal-{{$fbi->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Tambah Konten</h3>
            </div>

            <div class="modal-body">
                
                <form action="/{{ auth()->user()->role }}/forum/{{ $fbi->id }}/edit" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group {{ $errors->has('no_hp')?' has-error':'' }}">
                        <label for="konten">Konten</label>
                        <textarea class="form-control" id="konten" rows="3" name="konten"
                            placeholder="Konten..">{{ $fbi->konten }}</textarea>
                        @if($errors->has('konten'))
                        <span class="help-block">{{ $errors->first('konten') }}</span>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
               
            </div>

        </div>
    </div>
</div>
@endforeach

@endsection



<style>
    .table1 {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }
</style>