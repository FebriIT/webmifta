@extends('layouts.masteradmin')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="card">
                        <div class="col-md-12">
                        
                            <br>
                            <div class="card-body">
                                <div class="col-md-6">
                                    <div class="card-header" style="font-size: 20px;"><b>~ <u> Soal Pilihan Ganda </u></b></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="navbar-btn-right"><span id="timer" value="{{ old('timer') }}" style="font-size: 20px; font-weight:bold;"></span></div>
                                </div>
                                <form action="/siswa/tugas/simpan" method="POST" enctype="multipart/form-data">
                                @foreach ($data as $key=>$soal)
                                        {{ csrf_field() }}  
                                        
                                        <input type="hidden" name="soal_id" value="{{ $soal->id }}">
                                        <input type="hidden" name="tugas_id" value="{{ $tugas->id }}">
                                            <div class="form-group">
                                                @if ($soal->gambar)
                                                    
                                                        <a href="#{{$soal->id}}" data-toggle="modal">
                                                            <img src="{{asset('imgsoal/'.$soal->gambar)}}" width='150' height='100' data-toggle="modal" data-target="#exampleModal">
                                                        </a>
                                                    
                                                    <div  class="show_image">

                                                        <div class="modal fade" id="{{$soal->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <img src="{{asset('imgsoal/'.$soal->gambar)}}"  data-toggle="modal" data-target="#exampleModal">
                                                                    </div>
                                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div style="font-size: 18px;">
                                                    
                                                <p>{{ $loop->iteration }}. {{ $soal->soal }}  ? . . . .</p>
                                                    <div style="margin-left: 15px">
                                                    <input type="radio" name="pilih[{{ $soal->id }}]"
                                                        value={{'A'.'#'.$soal->id }}>A. {{ $soal->a }} <br>
                                                    <input type="radio" name="pilih[{{ $soal->id }}]"
                                                        value={{'B'.'#'.$soal->id }}>B. {{ $soal->b }} <br>
                                                    <input type="radio" name="pilih[{{ $soal->id }}]"
                                                        value={{'C'.'#'.$soal->id }}>C. {{ $soal->c }} <br>
                                                    <input type="radio" name="pilih[{{ $soal->id }}]"
                                                        value={{'D'.'#'.$soal->id }}>D. {{ $soal->d }}
                                                    </div>
                                                </div>
                                            </div>
                                @endforeach
                                @if($tugas->soalessay->count()==0)

                                
                                @else

                                
                                <div class="col-md-12">
                                    <div class="card-header" style="font-size: 20px;"><b>~ <u> Soal Essay </u></b></div>
                                <br>
                                </div>
                                
                                @foreach ($tugas->soalessay as $key=>$soals)
                                    
                                    <input type="hidden" name="tugas_id" value="{{ $tugas->id }}">
                                        <div class="form-group">
                                            <div style="font-size: 18px;">
                                                <p>{{ $loop->iteration }}. {{ $soals->pertanyaan }} ? . . . .</p>
                                            </div>
                                        </div>
                                        <div class="form-group {{ $errors->has('jawaban')?' has-error':'' }}">
                                            <label for="exampleInputEmail1">Jawaban</label>
                                            <textarea class="form-control" rows="3" name="jawaban" placeholder="jawaban.."></textarea>
                                            @if($errors->has('jawaban'))
                                                <span class="help-block">{{ $errors->first('jawaban') }}</span>
                                            @endif
                                        </div>
                                @endforeach
                                
                                @endif
                                
                                
                                <button type="submit" class="btn btn-primary navbar-btn-right"><i class="fa fa-paper-plane"
                                        aria-hidden="true"> Kirim Tugas</i></button>
                                
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.getElementById('timer').innerHTML =
    {{ $tugas->waktu }} + ":" + 00;
    startTimer();
    function startTimer() {
    var presentTime = document.getElementById('timer').innerHTML;
    var timeArray = presentTime.split(/[:]+/);
    var m = timeArray[0];
    var s = checkSecond((timeArray[1] - 1));
    if(s==59){m=m-1}
    if(m<0){alert('timer completed')}
    document.getElementById('timer').innerHTML =
        m + ":" + s;
    setTimeout(startTimer, 1000);
    }
    function checkSecond(sec) {
    if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
    if (sec < 0) {sec = "59"};
    return sec;
    }
</script>

<style>
    .show_image img{
        width: 100%;
    }
</style>

@endsection