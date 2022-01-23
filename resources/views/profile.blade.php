@extends('layouts.masteradmin')

@section('content')
@if(auth()->user()->role=='siswa')
<div class="container-fluid">
    <div class="row panel">
        <div class="col-md-12">
          <div class="panel-heading">
            
            
            <div class="panel-title text-center"> Anda Login Sebagai Siswa</div>
           
          </div>
        </div>
    </div>
    <div class="panel panel-profile">
        <div class="clearfix">
            <!-- LEFT COLUMN -->
            <div class="profile-left">
                <!-- PROFILE HEADER -->
                <div class="profile-header">
                    <div class="overlay"></div>
                    <div class="profile-main">
                        <img src="
                        @if(auth()->user()->role=='siswa')
                        {{ auth()->user()->siswa->getAvatar() }}
                        @else
                        /images/default.jpg
                        @endif
                        " style="width:150px;height:150px;" class="img-circle image" alt="Avatar">

                        <h3 class="name">{{ auth()->user()->name }}</h3>
                        <span class="online-status status-available">Available</span>
                    </div>
                    <div class="profile-stat">
                        <div class="row">
                            <div class="col-md-6 stat-item">
                               {{ $siswa->kelas->mapel->count() }} <span>Matapelajaran</span>
                            </div>
                            <div class="col-md-6 stat-item">
                                1 <span>Tugas</span>
                            </div>
                           
                        </div>
                    </div>
                </div>
                
                <div class="profile-detail">
                    <div class="profile-info">
                        <h4 class="heading">Basic Info</h4>
                        <ul class="list-unstyled list-justify">
                            <li>NISN :<span>{{ auth()->user()->siswa->nisn }}</span></li>
                            <li>Email :<span>{{ auth()->user()->email }}</span></li>
                            <li>Agama :<span>{{ auth()->user()->siswa->agama }}</span></li>
                            <li>Kelas :<span>{{ auth()->user()->siswa->kelas->nama }}</span></li>
                         
                        </ul>
                    </div>
                </div>
                
            </div>
            <!-- END LEFT COLUMN -->
            <!-- RIGHT COLUMN -->
            <div class="profile-right">
                <h4 style="font-weight: bold;text-align: center;" ><u> Update Profile </u></h4>
                
                <form action="/siswa/profile/{{ auth()->user()->siswa->id }}/simpan"  method="POST" enctype="multipart/form-data">

                 {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('nisn')?' has-error':'' }}">
                        <label for="exampleInputEmail1">NISN</label>
                        <input value={{ auth()->user()->siswa->nisn }} disabled type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NISN">
                    </div>
                    <div class="form-group {{ $errors->has('nama')?' has-error':'' }}">
                        <label for="exampleInputEmail1">Nama</label>
                        <input value={{ auth()->user()->siswa->nama }} name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama">
                    </div>
                    <div class="form-group {{ $errors->has('avatar')?' has-error':'' }}">
                        <label for="exampleInputEmail1">Avatar</label>
                        <input type="file" name="avatar" class="form-control">
                        @if($errors->has('avatar'))
                        <span class="help-block">{{ $errors->first('avatar') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('password')?' has-error':'' }}">
                        <label for="exampleInputEmail1">Password</label>
                        <input value="" name="password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="New Password">
                        
                    </div>
                    <div class="form-group {{ $errors->has('password')?' has-error':'' }}">
                        <label for="exampleInputEmail1 " >Konfirmasi Password Baru</label>
                        <input name="password_confirmation" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Konfirmasi Password">
                        @if ($errors->any('password_confirmation'))
                            <span>{{$errors->first('password_confirmation')}}</span>
                        @endif
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary navbar-btn-right">Simpan</button>
                </form>

            </div>
            <!-- END RIGHT COLUMN -->
        </div>
    </div>
</div>
@else
<div class="container-fluid">
    <div class="row panel">
        <div class="col-md-12">
          <div class="panel-heading">
            
            <div class="panel-title text-center"> Anda Login Sebagai Guru</div>
            
          </div>
        </div>
    </div>
    <div class="panel panel-profile">
        <div class="clearfix">
            <!-- LEFT COLUMN -->
            <div class="profile-left">
                <!-- PROFILE HEADER -->
                <div class="profile-header">
                    <div class="overlay"></div>
                    <div class="profile-main">
                        <img src="
                        @if(auth()->user()->role=='guru')
                        {{ auth()->user()->guru->getAvatar() }}
                        @else
                        /images/default.jpg
                        @endif
                        " style="width:150px;height:150px;" class="img-circle image" alt="Avatar">
                        <h3 class="name">{{ auth()->user()->name }}</h3>
                        <span class="online-status status-available">Available</span>
                    </div>
                    
                </div>
                <div class="profile-detail">
                    <div class="profile-info">
                        <h4 class="heading">Basic Info</h4>
                        <ul class="list-unstyled list-justify">
                            <li>NIP  <span> {{ auth()->user()->guru->nip }}</span></li>
                            <li>Email <span>{{ auth()->user()->email }}</span></li>
                            <li>Tanggal Lahir <span>{{ auth()->user()->guru->tanggal_lahir }}</span></li>
                            <li>Nomor HP <span>{{ auth()->user()->guru->no_hp }}</span></li>
                        </ul>
                    </div>
                </div>
                
            </div>
            <!-- END LEFT COLUMN -->
            <!-- RIGHT COLUMN -->
            <div class="profile-right">
                <h4 style="font-weight: bold;text-align: center;" ><u> Update Profile </u></h4>
                
                <form action="/guru/profile/{{ auth()->user()->guru->id }}/simpan" method="POST" enctype="multipart/form-data">
                
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('nip')?' has-error':'' }}">
                        <label for="exampleInputEmail1">NIP</label>
                        <input value={{ auth()->user()->guru->nip }} disabled  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIP">
                    </div>
                    <div class="form-group {{ $errors->has('nama')?' has-error':'' }}">
                        <label for="exampleInputEmail1">Nama</label>
                        <input value={{ auth()->user()->guru->nama }} name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama">
                    </div>
                    <div class="form-group {{ $errors->has('avatar')?' has-error':'' }}">
                        <label for="exampleInputEmail1">Avatar</label>
                        <input type="file" name="avatar" class="form-control">
                        @if($errors->has('avatar'))
                        <span class="help-block">{{ $errors->first('avatar') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('password')?' has-error':'' }}">
                        <label for="aaa">Password Baru</label>
                        <input  name="password"  type="password" class="form-control" id="aaa"  placeholder="Password Baru" value="{{old('password')}}">
                        @if ($errors->any('password'))
                            <span>{{$errors->first('password')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('password')?' has-error':'' }}">
                        <label for="exampleInputEmail1 " >Konfirmasi Password Baru</label>
                        <input name="password_confirmation" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Konfirmasi Password">
                        @if ($errors->any('password_confirmation'))
                            <span>{{$errors->first('password_confirmation')}}</span>
                        @endif
                    </div>
                    
                   
                    <button type="submit" class="btn btn-primary navbar-btn-right">Simpan</button>
                </form>

            </div>
            <!-- END RIGHT COLUMN -->
        </div>
    </div>
</div>
@endif

@stop