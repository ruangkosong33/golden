<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $post=DB::table('post')->paginate('7');

        return view('admin.pages.post.index_post', ['post'=>$post]);
    }

    public function create()
    {
        return view('admin.pages.post.create_post');
    }

    public function store(Request $request)
    {
        $this->validate([$request,
            'title_post'=>'required',
        ]);

        DB::table('post')->insert([
            'title_post'=>$request->title_category,
            'slug'=>Str::slug($request->title_category),
            'body'=>$request->body,
            'is_active'=>$request->is_active,
            'views'=>$request->views,
        ]);

        return redirect()->route('posts.index')->with('message', 'Data Post Berhasl Di Tambahkan');
    }

    public function edit($id)
    {
        $post=DB::table('post')->where('id', $id)->first();

        return view('admin.pages.edit_post', ['post'=>$post]);
    }

    public function update(Request $request, $id)
    {
        $this->validate('post')->update($request,[
            'title_post'=>'required',
        ]);

        DB::table('post')->update([
            'title_post'=>$request->title_post,
            'slug'=>Str::slug($request->title_post),
        ]);
    }
}
