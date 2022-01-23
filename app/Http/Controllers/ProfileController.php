<?php

namespace App\Http\Controllers;



use App\Mapel;
use Illuminate\Http\Request;
use App\Siswa;
use App\Tugas;
use App\Kelas;
use App\User;
use App\Guru;


class ProfileController extends Controller
{
    public function simpan( $id,Request $request)
    {
        
        
        
        if (auth()->user()->role == 'siswa'){
            $siswa=Siswa::find($id);
            $user=User::find($siswa->user_id);

            $user->name = $request->nama;
            if($request->password){
                $join=$this->validate($request, [
                    'password' => 'min:6',
                    'password_confirmation' => 'required_with:password|same:password|min:6',
                ]);
                $user->password=bcrypt($request->password);
            }
            $user->save();
            
            $siswa->update($request->all());
            if ($request->has('avatar')) {
                $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
                $siswa->avatar = $request->file('avatar')->getClientOriginalName();
                $siswa->save();
            }
            return redirect('/siswa/profile/'.auth()->user()->siswa->id)->with('sukses', 'Data Berhasil Diupdate');
        }elseif(auth()->user()->role == 'guru'){
            $guru=Guru::find($id);
            $user=User::find($guru->user_id);

            $user->name = $request->nama;
            if($request->password){
                $join=$this->validate($request, [
                    'password' => 'min:6',
                    'password_confirmation' => 'required_with:password|same:password|min:6'
                ]);
                $user->password=bcrypt($request->password);
                
            }
            
            $user->save();
            $guru->update($request->all());
            
            if ($request->has('avatar')) {
                $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
                $guru->avatar = $request->file('avatar')->getClientOriginalName();
                $guru->save();
                // $guru->update($request->all());
            }
            return redirect('/guru/profile/'.auth()->user()->guru->id)->with('sukses', 'Data Berhasil Diupdate');
        }

    }

    public function index($id)
    {
        $siswa=Siswa::find($id);
        $kelas=Kelas::all();
        $mapel=Mapel::all();
        $tugas=Tugas::all();
        return view('profile',['siswa'=>$siswa,'mapel'=>$mapel,'tugas'=>$tugas]);
    }
    public function edit($id)
    {
        $guru = \App\Guru::find($id);
        return view('profile', ['guru' => $guru]);
    }
    public function update(Request $request, $id)
    {
        $guru = \App\Guru::find($id);
        $guru->update($request->all());
        if (auth()->user()->role == 'admin') {
            return redirect('/admin/profile')->with('sukses', 'Data Berhasil Diupdate');
        } elseif (auth()->user()->role == 'guru') {
            return redirect('/guru/profile')->with('sukses', 'Data Berhasil Diupdate');
        } elseif (auth()->user()->role == 'siswa') {
            return redirect('/siswa/profile')->with('sukses', 'Data Berhasil Diupdate');
        }
    }

    
}
