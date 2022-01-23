<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Kelas;
use App\Materi;
use App\TahunAkademik;
use Illuminate\Support\Facades\Storage;

use File;

use function Symfony\Component\String\s;

class MateriController extends Controller
{
    public function pilihtahun()
    {
        $data = TahunAkademik::orderBy('id', 'desc')->get();
        return view('materi.pilihtahun', compact('data'));
    }
    public function index(Request $request, $id)
    {
        if ($request->has('cari')) {
            $data_materi = \App\Materi::where('id_tahun', $id)->where('nama_mp', 'LIKE', '%' . $request->cari . '%')->paginate(8);
        } else {
            $data_materi = \App\Materi::where('id_tahun', $id)->paginate(20);
        }

        $mapel = \App\Mapel::where('id_tahun', $id)->get();
        $kelas = \App\Kelas::where('id_tahun', $id)->get();
        $tahun = TahunAkademik::find($id);
        return view('materi.index', compact('data_materi', 'kelas', 'mapel', 'id', 'tahun'));
    }


    public function view($id)
    {
        $data_materi = Materi::find($id);

        return view('materi.view', compact('data_materi'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [

            'nama' => 'required',
            'kelas_id' => 'required',

            'mapel_id' => 'required',


        ]);
        $data = new Materi;



        $data->nama = $request->nama;
        $data->kelas_id = $request->kelas_id;
        $data->mapel_id = $request->mapel_id;
        $data->link = $request->link;
        $data->id_tahun = $request->id_tahun;
        $data->author = auth()->user()->name;

        if ($request->has('file_materi')) {


            $request->file('file_materi')->move(public_path() . '/storage/materi/', $request->file('file_materi')->getClientOriginalName());
            $data->file_materi = $request->file('file_materi')->getClientOriginalName();
            $data->save();
        }
        $data->save();



        return redirect()->back()->with('sukses', 'Data Berhasil Dibuat');
    }




    public function hapus($id)
    {
        $materi = Materi::findOrFail($id);


        $image_path = '/public/materi/' . $materi->file_materi;
        // dd($image_path);
        if (Storage::exists($image_path)) {

            Storage::delete($image_path);
        }
        $materi->delete();
        return redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
    }

    public function getDownload($file_materi)
    {


        return  response()->download('storage/materi/' . $file_materi);
    }
}
