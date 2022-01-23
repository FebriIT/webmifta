@extends('layouts.masteradmin')

@section('content')
<style>
  .carousel {
    position: relative;
  }

  .carousel.pointer-event {
    -ms-touch-action: pan-y;
    touch-action: pan-y;
  }

  .carousel-inner {
    position: relative;
    width: 100%;
    overflow: hidden;
  }

  .carousel-inner::after {
    display: block;
    clear: both;
    content: "";
  }

  .carousel-item {
    position: relative;
    display: none;
    float: left;
    width: 100%;
    margin-right: -100%;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    transition: -webkit-transform 0.6s ease-in-out;
    transition: transform 0.6s ease-in-out;
    transition: transform 0.6s ease-in-out, -webkit-transform 0.6s ease-in-out;
  }

  @media (prefers-reduced-motion: reduce) {
    .carousel-item {
      transition: none;
    }
  }

  .carousel-item.active,
  .carousel-item-next,
  .carousel-item-prev {
    display: block;
  }

  .carousel-item-next:not(.carousel-item-left),
  .active.carousel-item-right {
    -webkit-transform: translateX(100%);
    transform: translateX(100%);
  }

  .carousel-item-prev:not(.carousel-item-right),
  .active.carousel-item-left {
    -webkit-transform: translateX(-100%);
    transform: translateX(-100%);
  }

  .carousel-fade .carousel-item {
    opacity: 0;
    transition-property: opacity;
    -webkit-transform: none;
    transform: none;
  }

  .carousel-fade .carousel-item.active,
  .carousel-fade .carousel-item-next.carousel-item-left,
  .carousel-fade .carousel-item-prev.carousel-item-right {
    z-index: 1;
    opacity: 1;
  }

  .carousel-fade .active.carousel-item-left,
  .carousel-fade .active.carousel-item-right {
    z-index: 0;
    opacity: 0;
    transition: opacity 0s 0.6s;
  }

  @media (prefers-reduced-motion: reduce) {

    .carousel-fade .active.carousel-item-left,
    .carousel-fade .active.carousel-item-right {
      transition: none;
    }
  }

  .carousel-control-prev,
  .carousel-control-next {
    position: absolute;
    top: 0;
    bottom: 0;
    z-index: 1;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-pack: center;
    justify-content: center;
    width: 15%;
    color: #fff;
    text-align: center;
    opacity: 0.5;
    transition: opacity 0.15s ease;
  }

  @media (prefers-reduced-motion: reduce) {

    .carousel-control-prev,
    .carousel-control-next {
      transition: none;
    }
  }

  .carousel-control-prev:hover,
  .carousel-control-prev:focus,
  .carousel-control-next:hover,
  .carousel-control-next:focus {
    color: #fff;
    text-decoration: none;
    outline: 0;
    opacity: 0.9;
  }

  .carousel-control-prev {
    left: 0;
  }

  .carousel-control-next {
    right: 0;
  }

  .carousel-control-prev-icon,
  .carousel-control-next-icon {
    display: inline-block;
    width: 20px;
    height: 20px;
    background: no-repeat 50% / 100% 100%;
  }

  .carousel-control-prev-icon {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M5.25 0l-4 4 4 4 1.5-1.5L4.25 4l2.5-2.5L5.25 0z'/%3e%3c/svg%3e");
  }

  .carousel-control-next-icon {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M2.75 0l-1.5 1.5L3.75 4l-2.5 2.5L2.75 8l4-4-4-4z'/%3e%3c/svg%3e");
  }

  .carousel-indicators {
    position: absolute;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 15;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: center;
    justify-content: center;
    padding-left: 0;
    margin-right: 15%;
    margin-left: 15%;
    list-style: none;
  }

  .carousel-indicators li {
    box-sizing: content-box;
    -ms-flex: 0 1 auto;
    flex: 0 1 auto;
    width: 30px;
    height: 3px;
    margin-right: 3px;
    margin-left: 3px;
    text-indent: -999px;
    cursor: pointer;
    background-color: #fff;
    background-clip: padding-box;
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
    opacity: .5;
    transition: opacity 0.6s ease;
  }

  @media (prefers-reduced-motion: reduce) {
    .carousel-indicators li {
      transition: none;
    }
  }

  .carousel-indicators .active {
    opacity: 1;
  }

  .carousel-caption {
    position: absolute;
    right: 15%;
    bottom: 20px;
    left: 15%;
    z-index: 10;
    padding-top: 20px;
    padding-bottom: 20px;
    color: #fff;
    text-align: center;
  }

  .img-x {
    margin-left: auto;
    margin-right: auto;
    display: block;
    width: 900px;
  }
</style>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

{{-- content  --}}

  <div class="container-fluid">
    <div class="row ">
      @foreach ($pengumuman as $data)


    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
                <h4 style="color:red;"> Pengumuman : {{$data->pesan}} </h4>
            </div>
        </div>
    </div>
    @endforeach
      <div class="col-md-7">
        <div class="panel">
          <div class="panel-heading">

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="{{ asset('images/bg1.jpg') }}" class="d-block img-x w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="{{ asset('images/bg2.jpg') }}" class="d-block img-x w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="{{ asset('images/bg3.jpg') }}" class="d-block img-x w-100" alt="...">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>

      </div>
     
      <div class="col-md-5">
        <div class="panel">
          <div class="panel-heading">
            <h3 class="panel-title">Jadwal Ngajar</h3>
          </div>
          <div class="panel-body">
            @if (auth()->user()->role=='guru')
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Hari</th>
                  <th>Kelas</th>
                  <th>Jam ngajar</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($jadwal as $key=>$item)
                    <tr>
                      <td>{{ ++$key }}</td>
                      <td>{{ $item->hari }}</td>
                      <td>{{ $item->kelas->nama }}</td>
                      <td>{{ $item->jadwal_mulai }}</td>
                    </tr>
                @endforeach
                

              </tbody>
            </table>
            @elseif(auth()->user()->role=='admin')
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Guru</th>
                  <th>Hari</th>
                  <th>Kelas</th>
                  <th>Jam ngajar</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($jadwal as $key=>$item)
                    <tr>
                      <td>{{ ++$key }}</td>

                      <td>{{ $item->guru->nama }}</td>
                      <td>{{ $item->hari }}</td>
                      <td>{{ $item->kelas->nama }}</td>
                      <td>{{ $item->jadwal_mulai }}</td>
                    </tr>
                @endforeach
                

              </tbody>
            </table>
            @else
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  {{-- <th>#</th> --}}
                  <th>Guru</th>
                  <th>Mapel</th>
                  <th>Hari</th>
                  <th>Jam</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($jadwal as $key=>$item)
                    <tr>
                      {{-- <td>{{ ++$key }}</td> --}}

                      <td>{{ $item->guru->nama }}</td>
                      <td>{{ $item->mapel }}</td>
                      <td>{{ $item->hari }}</td>
                      <td>{{ $item->jadwal_mulai }}</td>
                    </tr>
                @endforeach
                

              </tbody>
            </table>

            @endif
            
          </div>
        </div>
      </div>
    </div>
  </div>
@stop