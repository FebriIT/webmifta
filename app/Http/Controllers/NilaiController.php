<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Mapel;
use App\Guru;
use App\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class NilaiController extends Controller
{
    public function index($id)
    {
        $mapel=Mapel::all();
        $siswa=Siswa::find($id);
        
      
        return view('nilai.index',['siswa'=>$siswa,'mapel'=>$mapel]);
    }
    
    public function open($id)
    {
        $siswa=Siswa::find($id);
        $mapel=Mapel::all();
        return view('nilai.open',['siswa'=>$siswa,'mapel'=>$mapel]);
    }
    public function tambahdata(Request $request)
    {
        $data=new Nilai;
        $data->tugas1=$request->tugas1;
        $data->tugas2=$request->tugas2;
        $data->tugas3=$request->tugas3;
        $data->tugas4=$request->tugas4;
        $data->tugas5=$request->tugas5;
        $data->tugas6=$request->tugas6;
        $data->uas=$request->uas;
        $data->uts=$request->uts;
        $data->mapel_id=$request->mapel_id;
        $data->siswa_id=$request->siswa_id;
        $data->save();
        return redirect()->back()->with('sukses','data berhasil ditambah');
    }
    public function update($id,Request $request)
    {
        $nilai=Nilai::find($id);
       
        $nilai->update($request->all());
        return redirect()->back()->with('sukses','data berhasil diupdate');
    }

    public function hapus($id)
    {
        $data=Nilai::find($id);
        $data->delete();
        return redirect()->back()->with('sukses','data berhasil dihapus');
    }

    
}
