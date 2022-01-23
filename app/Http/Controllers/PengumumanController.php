<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengumuman;

class PengumumanController extends Controller
{
    public function index (){
        $data=Pengumuman::all();
        return view('pengumuman.index',['data'=>$data]);
    }
    public function create(Request $request)
    {
        Pengumuman::create($request->all());
        return redirect('admin/pengumuman')->with('sukses','data berhasil diinput');
    }

    public function hapus($id)
    {
        $data=Pengumuman::find($id);
        $data->delete();
        return redirect('admin/pengumuman')->with('sukses','data berhasil dihapus');
    }
}
