<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $video=DB::table('video')->paginate('7');

        return view('admin.pages.index_video', ['video'=>$video]);
    }

    public function create()
    {
        return view('admin.pages.video.create_video');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title_video'=>'required',
            'link'=>'required',
        ]);

        DB::table('video')->insert([
            'title_video'=>$request->title_video,
            'slug'=>Str::slug($request->title_video),
            'link'=>$request->link,
        ]);

        return redirect()->route('video.index')->with('message', 'Data Video Berhasil Di Tambahkan');
    }
}
