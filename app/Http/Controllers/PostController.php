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
        $post=DB::table('posts')->paginate('7');

        return view('admin.pages.posts.index_posts', ['post'=>$post]);
    }

    public function create()
    {
        return view('admin.pages.posts.create_posts');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title_post'=>'required',
        ]);

        DB::table('post')->insert([
            'title_post'=>$request->title_category,
            'slug'=>Str::slug($request->title_category),
            'body'=>$request->body,
            'is_active'=>$request->is_active,
        ]);

        return redirect()->route('posts.index')->with('message', 'Data Post Berhasl Di Tambahkan');
    }

    public function edit($id)
    {
        $post=DB::table('posts')->where('id', $id)->first();

        return view('admin.pages.edit_posts', ['post'=>$post]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title_post'=>'required',
        ]);

        DB::table('post')->where('id', $request->id)->update([
            'title_post'=>$request->title_post,
            'slug'=>Str::slug($request->title_post),
            'body'=>$request->body,
            'is_active'=>$request->is_active,
        ]);
    }
}
