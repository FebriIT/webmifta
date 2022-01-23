<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapel;
use App\Guru;
use App\Kelas;
use App\Tugas;
use App\TahunAkademik;

class MapelController extends Controller
{
    public function pilihtahun()
    {
        $data = TahunAkademik::orderBy('id', 'desc')->get();
        return view('mapel.pilihtahun', compact('data'));
    }
    public function index(Request $request, $id)
    {
        if ($request->has('cari')) {
            $data_mapel = Mapel::where('id_tahun', $id)->where('nama', 'LIKE', '%' . $request->cari . '%')->paginate(10);
        } else {
            $data_mapel = Mapel::where('id_tahun', $id)->paginate(10);
        }
        $guru = Guru::all();

        $kelas = Kelas::where('id_tahun', $id)->get();

        $tahun = TahunAkademik::find($id);
        return view('mapel.index', compact('data_mapel', 'guru', 'kelas', 'tahun', 'id'));
    }
    public function index2($id)
    {
        $mapel = Mapel::find($id);
        // dd($guru);
        return view('mapel.index2', ['mapel' => $mapel]);
    }

    public function create(Request $request)
    {
        $mapel = Mapel::create($request->all());
        $mapel->kelas()->attach($request->kelas);

        return redirect()->back()->with('sukses', 'Data Berhasil Ditambah');
    }

    public function hapus($id)
    {
        $data_mapel = Mapel::find($id);


        if ($data_mapel->materi->count() == 0) {
            $data_mapel->delete();
            return redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
        } else {

            return redirect()->back()->with('gagal', 'Data Gagal Dihapus, Hapus Materi Yang Berhubungan Dengan Mata Pelajaran Terlebih Dahulu');
        }
    }

    public function open($id)
    {
        $mapel = Mapel::find($id);
        $data_tugas = Tugas::find($id);
        return view('mapel.open', ['data_tugas' => $data_tugas, 'mapel' => $mapel]);
    }
}
