<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tugas;
use App\Kelas;
use App\KelasTugas;
use App\Mapel;
use App\Soal;
use App\Siswa;
use App\SoalEssay;
use App\SoalEssayJawaban;
use App\SoalJawaban;
use App\TugasSiswa;
use App\TahunAkademik;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Redis;

use function Ramsey\Uuid\v1;

class TugasController extends Controller
{
    public function pilihtahun()
    {
        $data = TahunAkademik::orderBy('id', 'desc')->get();
        return view('tugas.pilihtahun', compact('data'));
    }
    public function index($id)
    {
        $data_tugas = Tugas::where('id_tahun', $id)->where('user_id',auth()->user()->id)->get();
        $guru = Kelas::where('id_tahun', $id)->get();
        $mapel = Mapel::all();
        $siswa = Siswa::all();
        $tahun = TahunAkademik::find($id);
        return view('tugas/index', compact('data_tugas', 'kelas', 'mapel', 'siswa', 'id', 'tahun'));
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            
            'waktu' => 'required',
            'kelas' => 'required',


        ]);


        $request->request->add(['pembuat' => auth()->user()->guru->nama,'user_id'=>auth()->user()->id]);
        $tugas = Tugas::create($request->all());
        $tugas->kelas()->attach($request->kelas);

        //dd($data_tugas);

        return redirect()->back()->with('sukses', 'Data Berhasil Ditambah');
    }

    public function hapus($id)
    {
        $data_tugas = Tugas::find($id);
        $data_tugas->kelas()->detach();
        $data_tugas->soal()->delete();
        // dd($data_tugas);
        // $data_tugas->kelas()->detach($id);
        // $kelas_tugas=Tugas::findOrFail('?');
        // $kelas_tugas->delete();
        $data_tugas->delete();
        return redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
    }
    public function delete($id)
    {
        $soal = Soal::find($id);
        $soal->delete();
        return back()->with('sukses', 'Data Berhasil Dihapus');
    }

    public function open($id)
    {
        $tugas = Tugas::find($id);
        $soal = Soal::all();
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        $soalessay = SoalEssay::all();
        return view('tugas.open', ['tugas' => $tugas, 'soal' => $soal, 'kelas' => $kelas, 'soalessay' => $soalessay, 'mapel' => $mapel]);
    }

    public function post(Request $request)
    {
        $tugas = Tugas::all();
        $soal = Soal::all();
        $tugas->soal->kelas()->attach($request->kelas);
        return redirect('/admin/tugas')->with('sukses', 'Data Berhasil Dipost');
    }
    public function edit($id, Request $request)
    {
        $tugas = Tugas::find($id);

        $tugas->update($request->all());
        if (auth()->user()->role == 'admin') {
            return back()->with('sukses', 'Data Berhasil Diupdate');
        } elseif (auth()->user()->role == 'guru') {

            return back()->with('sukses', 'Data Berhasil Diupdate');
        }
    }
    public function createpilihanganda($id, Request $request)
    {
        $this->validate($request, [
            'soal' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'kunci' => 'required',
            'score' => 'required',
            'gambar' => 'mimes:jpg,png,jpeg'
        ]);
        $tugas = Tugas::find($request->id);
        $ttt = $request->request->add(['tugas_id' => $tugas->id]);

        $soal = Soal::create($request->all());
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('imgsoal/', $request->file('gambar')->getClientOriginalName());
            $soal->gambar = $request->file('gambar')->getClientOriginalName();
            $soal->save();
        }

        if (auth()->user()->role == 'admin') {
            return back()->with('sukses', 'Data Berhasil Ditambah');
        } elseif (auth()->user()->role == 'guru') {

            return back()->with('sukses', 'Data Berhasil Ditambah');
        }
    }
    public function createesay($id, Request $request)
    {
        $this->validate($request, [
            'pertanyaan' => 'required',
            'score' => 'required',



        ]);

        $tugas = Tugas::find($request->id);
        $ttt = $request->request->add(['tugas_id' => $tugas->id]);
        $soal = SoalEssay::create($request->all());
        return back()->with('sukses', 'Data Berhasil Ditambah');
    }

    public function takesoal($id, Request $request)
    {
        $tugas = Tugas::find($request->id);

        return view('tugas.take', ['tugas' => $tugas]);
    }


    public function soal($id)
    {
        $tugas = Tugas::find($id);
        $data = $tugas->soal->shuffle()->all();
        return view('tugas.soal', ['tugas' => $tugas, 'data' => $data]);
    }

    public function soalessay($id)
    {
        $tugas = Tugas::find($id);
        return view('tugas.soalessay', ['tugas' => $tugas]);
    }

    public function simpanjawaban(Request $request)
    {

        $pilih = $request->pilih;
        if ($pilih) {
            foreach ($pilih as $key => $value) {
                $jawaban = new \App\SoalJawaban;
                $jawaban->siswa_id = auth()->user()->siswa->id;
                $soals = explode('#', $value)[1];
                $datasoal = \App\Soal::where('id', $soals)->first();
                $tugas_id = $jawaban->tugas_id = $datasoal->tugas->id;
                $soal_id = $jawaban->soal_id = explode('#', $value)[1];

                $kelas_id = $jawaban->kelas_id = auth()->user()->siswa->kelas->id;

                $mapel_id = $jawaban->mapel_id = $datasoal->tugas->mapel_id;



                $jwb = $jawaban->jawaban = explode('#', $value)[0];

                $kunci = $datasoal->kunci;
                // dd($jwb.$kunci);
                // $soal=$jawaban->soal_id=explode(" ",$value);
                // $soal_id=$jawaban->soal_id = $soal->id;  
                // $kunci=$soal->kunci;
                // $jawaban->jawaban = $value;
                // $jwb=$value;

                if ($jwb == $kunci) {
                    $jawaban->status = 'benar';
                    $score = $jawaban->score = $datasoal->score;
                } else {
                    $jawaban->status = 'salah';
                    $jawaban->score = '0';
                }
                $jawaban->save();
            }
            $tugassiswa = new \App\TugasSiswa();
            $tugassiswa->siswa_id = auth()->user()->siswa->id;

            $tugassiswa->tugas_id = $datasoal->tugas->id;


            $tugassiswa->save();

            $ha = $datasoal->tugas->id;

            //soal essay

            $tugas = Tugas::find($ha);


            if ($tugas->soalessay->count() == 0) {
            } else {
                $jawab = new SoalEssayJawaban();
                $siswa = $jawab->siswa_id = auth()->user()->siswa->id;
                $tugas = $jawab->tugas_id = $request->tugas_id;
                // $jawaban=$jawab->jawaban=$request->jawaban;

                $jawab->jawaban = $request->jawaban;
                $jawab->save();
            }


            return redirect('/siswa/kelas/' . auth()->user()->siswa->kelas->id)->with('sukses', 'Tugas Berhasil Dikirim');
        } else {
            return redirect()->back()->with('gagal', 'Jawaban anda ada yang belum terisi, periksa kembali...');
        }
    }
    // public function simpanessay(Request $request)
    // {
    //     $jawab=new SoalEssayJawaban();
    //     $siswa=$jawab->siswa_id=auth()->user()->siswa->id;
    //     $tugas=$jawab->tugas_id=$request->tugas_id;
    //     // $jawaban=$jawab->jawaban=$request->jawaban;

    //     if($request->file('jawaban')){
    //         $filejawaban=$request->file('jawaban');
    //         $filename=$filejawaban->getClientOriginalName();//.'.'.$file_materi->getClientOriginalExtension();
    //         $request->jawaban->move('filejawaban/', $filename);
    //         $ttt=$jawab->jawaban=$filename;
    //     }
    //     $jawab->save();
    //     // dd($ttt);

    //     return redirect('/siswa/tugas/'.$tugas.'/takesoal')->with('sukses', 'Tugas Berhasil Dikirim');


    // }
    public function hasil($id)
    {
        $tugas = Tugas::find($id);
        $jwbessay = $tugas->soalessay_jawaban;
        $siswa = Siswa::all();

        $datasiswa = DB::select('SELECT siswa_tugas.id,siswa.nama,siswa_id FROM `siswa_tugas` join siswa on siswa_tugas.siswa_id=siswa.id JOIN tugas on siswa_tugas.tugas_id=tugas.id  WHERE tugas_id=?', [$id]);
        // dd($jwbessay);
        // $hasil=SoalJawaban::all()->first()->score;
        // dd($hasil);
        return view('tugas.hasil', ['tugas' => $tugas, 'jwbessay' => $jwbessay, 'siswa' => $siswa, 'datasiswa' => $datasiswa]);
    }
    public function getDownload($jawaban)
    {


        return  response()->download('filejawaban/' . $jawaban);
    }
    public function view($id)
    {
        $tugas = SoalEssayJawaban::find($id);

        return view('tugas.view', compact('tugas'));
    }

    public function hasilsiswa($id, $tugas_id)
    {


        $data = DB::select('SELECT soal_jawaban.id,soal_jawaban.tugas_id,soal_jawaban.kelas_id,soal_jawaban.mapel_id,soal_jawaban.soal_id,soal_jawaban.siswa_id,soal_jawaban.jawaban,soal_jawaban.status,soal_jawaban.score,siswa.nama,soal.soal
        FROM `soal_jawaban` 
        join siswa on soal_jawaban.siswa_id=siswa.id 
        join soal on soal_jawaban.soal_id=soal.id WHERE siswa_id=? AND soal_jawaban.tugas_id=?', [$id, $tugas_id]);

        $score = DB::table('soal_jawaban')
            ->where('siswa_id', '=', $id)
            ->where('tugas_id', '=', $tugas_id)->get()->sum('score');

        $dataessay = DB::select('SELECT soalessay_jawaban.id,soalessay_jawaban.siswa_id,soalessay_jawaban.tugas_id,soalessay_jawaban.jawaban,soalessay_jawaban.score,siswa.nama FROM `soalessay_jawaban` join siswa on soalessay_jawaban.siswa_id=siswa.id WHERE siswa_id=? AND soalessay_jawaban.tugas_id=?', [$id, $tugas_id]);
        $siswa = Siswa::find($id);

        $scoreessay = DB::table('soalessay_jawaban')
            ->where('siswa_id', '=', $id)
            ->where('tugas_id', '=', $tugas_id)->get()->sum('score');

        return view('tugas.hasilsiswa', ['data' => $data, 'siswa' => $siswa, 'score' => $score, 'dataessay' => $dataessay, 'id' => $id, 'tugas_id' => $tugas_id, 'scoreessay' => $scoreessay]);
    }

    public function tambahnilai(Request $request, $id)
    {

        $data = SoalEssayJawaban::find($id);
        $data->update($request->all());
        return redirect()->back();
    }

    public function hapushasil($id)
    {
        $data = TugasSiswa::find($id);
        $siswaid = $data->siswa_id;
        $tugasid = $data->tugas_id;
        // $soaljawaban = SoalJawaban::where('siswa_id', '=', $siswaid and 'tugas_id', '=', $tugasid)->get();
        // dd($soaljawaban);
        // $soaljawaban = DB::table('SELECT * FROM `soal_jawaban` WHERE siswa_id=? AND tugas_id=?', [$siswaid, $tugasid])->delete();
        DB::table('soal_jawaban')
            ->where('siswa_id', $siswaid)
            ->where('tugas_id', $tugasid)
            ->delete();
        DB::table('soalessay_jawaban')
            ->where('siswa_id', $siswaid)
            ->where('tugas_id', $tugasid)
            ->delete();
        $data->delete();

        return redirect()->back()->with('sukses', 'Tugas Berhasil Dikirim');
    }
}
