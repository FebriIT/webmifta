<?php

namespace App\Http\Controllers;

use App\JadwalPelajaran;
use Illuminate\Http\Request;
use App\Mapel;
use App\Pengumuman;
use App\Siswa;
use App\Tugas;

class DashboardController extends Controller
{
    public function index()
    {
        $kelas = \App\Kelas::all();
        $materi = \App\Materi::all();
        $guru = \App\Guru::all();
        $mapel = Mapel::all();
        // $siswa = \App\Siswa::find($id);
        $datasiswa = Siswa::all();
        $tugas = Tugas::all();
        $pengumuman=Pengumuman::all();
        if(auth()->user()->role=='guru'){

            $jadwal=JadwalPelajaran::where('guru_id',auth()->user()->guru->id)->get();
        }elseif(auth()->user()->role=='admin'){
            $jadwal=JadwalPelajaran::orderBy('id','desc')->get();
        }else{
            $jadwal=JadwalPelajaran::where('kelas_id',auth()->user()->siswa->kelas_id)->get();
        }
        return view('dashboard', ['kelas' => $kelas, 'materi' => $materi, 'guru' => $guru, 'mapel' => $mapel, 'tugas' => $tugas,'jadwal'=>$jadwal,'pengumuman'=>$pengumuman]);
    }
}
