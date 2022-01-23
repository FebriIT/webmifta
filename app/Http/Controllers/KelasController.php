<?php

namespace App\Http\Controllers;

use App\Guru;
use App\GuruKelas;
use App\Kelas;
use App\Materi;
use App\Siswa;
use App\TugasSiswa;
use App\Mapel;
use App\MapelSiswa;
use App\SoalJawaban;
use App\Tugas;
use App\Nilai;
use App\TahunAkademik;
use Illuminate\Http\Request;


class KelasController extends Controller
{
    public function pilihtahun(Request $request)
    {
        $data = TahunAkademik::orderBy('id', 'desc')->get();
        return view('kelas.pilihtahun', compact('data'));
    }
    public function index(Request $request, $id)
    {
        if(auth()->user()->role=='guru'){
            if ($request->has('cari')) {
                $data_kelas = \App\Kelas::where('id_tahun', $id)->where('nama', 'LIKE', '%' . $request->cari . '%')->paginate(6);
            } else {
                $data_kelas= Guru::find(auth()->user()->guru->id);
                // dd($data_kelas);
                // $data_kelas = \App\Kelas::where('id_tahun', $id)->paginate(6);
            }
        }else{
            if ($request->has('cari')) {
                $data_kelas = \App\Kelas::where('id_tahun', $id)->where('nama', 'LIKE', '%' . $request->cari . '%')->paginate(6);
            } else {
                $data_kelas = \App\Kelas::where('id_tahun', $id)->paginate(6);
            }
        }
        
        $tahun = TahunAkademik::find($id);

        return view('kelas.index', compact('data_kelas', 'tahun', 'id'));
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
        ]);

        \App\Kelas::create($request->all());
        return redirect()->back()->with('sukses', 'Data Berhasil Ditambah');
    }
    public function open($id)
    {
        $data_kelas = \App\Kelas::find($id);


        // $siswas=auth()->user()->siswa->id;
        $tugass = Tugas::all()->first();

        $done = TugasSiswa::all()->first();
        // dd($data_kelas->id_tahun);
        $id=$id;
        $mapel=Mapel::all();


        // $itsdone=TugasSiswa::all();
        // $tes=$itsdone->siswa;
        $datatugas = Kelas::where('id', $id and 'id_tahun', $data_kelas->id_tahun)->get();
        // dd($datatugas);

        $kelas = \App\Kelas::all();
        $siswa = Siswa::all();



        return view('kelas.open', ['data_kelas' => $data_kelas, 'kelas' => $kelas, 'siswa' => $siswa, 'done' => $done, 'tugass' => $tugass,'id'=>$id,'mapel'=>$mapel]);
    }
    public function tugassiswa($id)
    {
        $siswa = Siswa::find($id);
        $data = TugasSiswa::find($siswa->siswa_id);

        return view('kelas.tugassiswa', ['siswa' => $siswa, 'data' => $data]);
    }

    public function nilaisiswa($id)
    {
        $siswa = Siswa::find($id);

        return view('kelas.nilaisiswa', ['siswa' => $siswa]);
    }
    public function nilai(Request $request)
    {
        // $this->validate($request,[
        //     'nilai'=>'required',
        // ]);
        // $nilai=MapelSiswa::create($request->all());
        $nilai = new Nilai();
        $nilai->mapel_id = $request->mapel_id;
        $nilai->siswa_id = $request->siswa_id;
        $nilai->tugas1 = $request->tugas1;
        $nilai->tugas2 = $request->tugas2;
        $nilai->tugas3 = $request->tugas3;
        $nilai->tugas4 = $request->tugas4;
        $nilai->tugas5 = $request->tugas5;
        $nilai->tugas6 = $request->tugas6;
        $nilai->uts = $request->uts;
        $nilai->uas = $request->uas;
        $nilai->author = $request->nama;
        $nilai->save();
        return redirect()->back()->with('sukses', 'Nilai Berhasil Disimpan');
    }
    public function update(Request $request, $id)
    {
        $data = MapelSiswa::find($id);
        $data->update($request->all());
        return redirect()->back()->with('sukses', 'Nilai Berhasil diupdate');
    }


    public function siswa(Request $request)
    {
        $siswa = Siswa::all();
        $kelas = \App\Kelas::all();

        return view('kelas.siswa', ['kelas' => $kelas, 'siswa' => $siswa]);
    }
    public function hapuss($id)
    {
        $mapelsiswa = MapelSiswa::find($id);
        $mapelsiswa->delete();
        return redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
    }
    public function hapus($id)
    {
        $kelas = \App\Kelas::find($id);

        if ($kelas->siswa->count() == 0) {

            if ($kelas->materi->count() == 0) {
                if (auth()->user()->role == 'admin') {
                    $kelas->delete();
                    return redirect('/admin/kelas')->with('sukses', 'Data Berhasil Dihapus');
                } elseif (auth()->user()->role == 'guru') {
                    $kelas->delete();
                    return redirect('/guru/kelas')->with('sukses', 'Data Berhasil Dihapus');
                }
            } else {
                return redirect('/admin/kelas')->with('gagal', 'Data Gagal Dihapus, Hapus Materi Yang Ada Didalam Kelas Terlebih Dahulu...');
            }
        } else {
            return redirect('/admin/kelas')->with('gagal', 'Data gagal dihapus, hapus siswa yang ada didalam kelas terlebih dahulu...');
        }






        if (auth()->user()->role == 'admin') {
            return redirect('/admin/kelas')->with('sukses', 'Data Berhasil Dihapus');
        } elseif (auth()->user()->role == 'guru') {

            return redirect('/guru/kelas')->with('sukses', 'Data Berhasil Dihapus');
        }
    }
}
