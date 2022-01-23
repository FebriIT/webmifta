@extends('layouts.masteradmin')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="card">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="card-header" style="font-size: 20px;"><b>Soal Pilihan Ganda <span class="label label-success">{{ $tugas->jenis_tugas }}</span></b></div>

                            </div>
                            <div class="col-md-6">
                                <div class="navbar-btn-right"><span id="timer" value="{{ old('timer') }}" style="font-size: 20px; font-weight:bold;"></span></div>
                            </div>

                        </div>
                        
                        <br>
                        <div class="card-body">
                            @foreach ($tugas->soalessay as $key=>$soal)
                                <form action="/siswa/tugas/simpanessay" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}  
                                    <input type="hidden" name="soal_id" value="{{ $soal->id }}">
                                    <input type="hidden" name="tugas_id" value="{{ $tugas->id }}">
                                        <div class="form-group">
                                            <div style="font-size: 18px;">
                                                <p>{{ $loop->iteration }}. {{ $soal->pertanyaan }} ? . . . .</p>
                                            </div>
                                        </div>
                            @endforeach
                            <div class="form-group {{ $errors->has('jawaban')?' has-error':'' }}">
                                <label for="exampleInputEmail1">Jawaban</label>
                                <input type="file" name="jawaban" class="form-control">
                                @if($errors->has('jawaban'))
                                <span class="help-block">{{ $errors->first('jawaban') }}</span>
                                @endif
                            </div>
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

@endsection