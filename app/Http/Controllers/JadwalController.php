<?php

namespace App\Http\Controllers;

use App\Guru;
use Illuminate\Http\Request;
use App\JadwalPelajaran;
use App\Kelas;
use App\Mapel;

class JadwalController extends Controller
{
    public function index()
    {
        $data=JadwalPelajaran::all();
        $mapel=Mapel::all();
        $kelas=Kelas::all();
        $guru=Guru::all();
        return view('jadwal.index',compact('data','mapel','kelas','guru'));
    }
    public function create(Request $request)
    {
        
        $data=new JadwalPelajaran();
        $data->guru_id=$request->guru_id;
        $data->mapel=$request->mapel;
        $data->hari=$request->hari;
        $data->kelas_id=$request->kelas_id;
        $data->jadwal_mulai=$request->jadwal_mulai;
        $data->jadwal_selesai=$request->jadwal_selesai;
        $data->save();

        return redirect()->back()->with('sukses', 'Data Berhasil Dibuat');
    }
    public function hapus($id)
    {
        $data=JadwalPelajaran::find($id);
        $data->delete();
        return redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
    }
}
