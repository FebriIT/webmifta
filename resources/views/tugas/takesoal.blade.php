@extends('layouts.masteradmin')

@section('content')


<h3 class="page-title"><i class="fa fa-database"> Data Soal </i></h3>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title">Detail Soal</div>
                    <div class="panel-body">
                        <h3>Selamat Mengerjakan!!!</h3>
                        <div style="border-style:dashed; border-width:3px; border-color:blue;margin:5px;">
                            <div style="margin: 15px;">
                                <h4 style="font-weight: bold;color:rgb(0, 150, 45);">~ Soal Pilihan Ganda </h4>
                            <table class="table table-striped">
                                <tbody style="color: black;">
                                    <tr>
                                        <td>Judul</td>
                                        <td>:</td>
                                        <td>{{ $tugas->judul }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Tugas</td>
                                        <td>:</td>
                                        <td>{{ $tugas->jenis_tugas }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Soal</td>
                                        <td>:</td>
                                        <td>{{ $tugas->soal->count() }}</td>
                                    </tr>
                                    <tr>
                                        <td>Waktu</td>
                                        <td>:</td>
                                        <td>{{ $tugas->waktu }} menit</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="/siswa/tugas/{{ $tugas->id }}/soal" class="btn btn-primary btn-sm btn-block"><h4> Mulai Mengerjakan Soal </h4></a>
                            </div>
                        </div>
                        {{-- <br>
                        <div style="border-style:dashed; border-width:3px; border-color:blue;margin:5px;">
                            <div style="margin: 15px;">
                                <h4 style="font-weight: bold;color:rgb(0, 150, 45);">~ Soal Essay </h4>
                            <table class="table table-striped">
                                <tbody style="color: black;">
                                    <tr>
                                        <td>Judul</td>
                                        <td>:</td>
                                        <td>{{ $tugas->judul }}</td>
                                    </tr>
                                   
                                    <tr>
                                        <td>Jumlah Soal</td>
                                        <td>:</td>
                                        <td>{{ $tugas->soalessay->count() }}</td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <td>Waktu</td>
                                        <td>:</td>
                                        <td>{{ $tugas->waktu }} menit</td>
                                    </tr>
                                    
                                    
                                </tbody>
                            </table>
                            
                            
                            <a href="/siswa/tugas/{{ $tugas->id }}/soalessay" class="btn btn-primary btn-sm btn-block"><h4> Mulai Mengerjakan Soal </h4></a>
                            
                            </div>
                        </div> --}}
                        <br>
                        <div style="padding:  10px; border: double #fff 15px; color: #fff; background: #b90000;">
                            <p style="font-weight: bold;">Silahkan kerjakan soal yang telah di siapkan. Harap dipatuhi peraturan berikut!</p>
                            <ul>
                                <li>Jangan mereload/refresh browser (jawaban akan hilang)</li>
                                <li>Jangan menekan tombol selesai saat mengerjakan soal, kecuali saat anda telah selesai mengerjakan seluruh soal</li>
                                <li>Perhatikan sisa waktu ujian, sistem akan mengumpulkan jawaban saat waktu sudah selesai</li>
                                <li>Waktu ujian akan dimulai saat tombol "<b>Mulai Mengerjakan Soal!</b>" di klik</li>
                                <li>Dilarang bekerjasama dengan teman</li>
                                <li>Jangan keluar dari mode fullscreen, setiap upaya keluar dari mode tersebut akan dihitung</li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>


@endsection

