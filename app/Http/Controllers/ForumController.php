<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;
use App\Pengumuman;

class ForumController extends Controller
{
    public function index($id)
    {
        $forum = Forum::where('kelas_id',$id)->orderBy('created_at', 'desc')->paginate(10);
        $pengumuman = Pengumuman::all();
        return view('forum.index', compact(['forum', 'pengumuman','id']));
    }

    public function create(Request $request)
    {
        $this->validate($request, [

            'konten' => 'required',

        ]);
        // dd($request->all());

        $forum = new Forum;

        $forum->konten = $request->konten;
        $forum->user_id = auth()->user()->id;
        $forum->kelas_id=$request->kelas_id;
        $forum->save();
        return redirect()->back()->with('sukses', 'Data Berhasil Diposting');
    }

    public function delete($id)
    {

        $data = Forum::find($id)->delete();
        return redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
    }

    public function edit($id, Request $request)
    {
        $data = Forum::find($id)->update($request->all());
        return redirect()->back()->with('sukses', 'Data Berhasil Diubah');
    }
}
