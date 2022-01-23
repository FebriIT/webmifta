<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TahunAkademik;
use App\Kelas;
use App\Materi;
use App\Siswa;
use App\Tugas;

class TahunAkademikController extends Controller
{
    public function index()
    {
        $data = TahunAkademik::orderBy('id', 'desc')->get();
        return view('tahunakademik.index', compact('data'));
    }
    public function create(Request $req)
    {

        $data = new TahunAkademik();
        $data->tahun = $req->tahun;
        $data->save();
        return redirect()->back()->with('sukses', 'Data Berhasil Ditambahkan');
    }

    public function hapus($id)
    {
        $data = TahunAkademik::find($id);
        $kelas = Kelas::where('id_tahun', $id)->delete();
        $materi = Materi::where('id_tahun', $id)->delete();
        $siswa = Siswa::where('id_tahun', $id)->delete();
        $tugas = Tugas::where('id_tahun', $id)->delete();
        $data->delete();
        return redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
    }
}
