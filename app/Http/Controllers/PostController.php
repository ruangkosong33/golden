<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        // $post=DB::table('posts')
        //                     ->join('categorys', 'posts.categorys_id', '=','categorys.id')
        //                     ->select('posts.*', 'categorys.title_category')
        //                     ->paginate('5');
    
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
            'title_post'=>$request->title_post,
            'slug'=>Str::slug($request->title_post),
            'body'=>$request->body,
            'picture_post'=>$request->picture_post,
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
        if(empty($request->file('picture_post')))
        {
           $picture_post=$request->file('picture_post');
           $picture_post1=$request->$picture_post->getClientOriginalName();
           $picture_post2=$request->picture_post->getClientOriginalExtenstion();
           $path=$request->file('picture_post')->storeAs('public/post-image', $picture_post2);     
        }else {
            $picture_post='no_image';
        }
        $this->validate($request,[
            'title_post'=>'required',
        ]);

        DB::table('post')->where('id', $request->id)->update([
            'title_post'=>$request->title_post,
            'slug'=>Str::slug($request->title_post),
            'body'=>$request->body,
            'picture_post'=>$request->picture_post,
            'is_active'=>$request->is_active,
        ]);

        return redirect()->route('posts.index')->with('message', 'Data Post Berhasil Di Update');
    }

    public function destroy($id)
    {
        $post=DB::table('posts')->where('id', $id)->delete();

        return redirect('category.index')->with('message', 'Data Post Berhasil Di Hapus');
    }
}
