<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        // $post=DB::table('posts')
        //                     ->join('categorys', 'posts.categorys_id', '=','categorys.id')
        //                     ->select('posts.*', 'categorys.title_category')
        //                     ->paginate('5');

        $post=Post::orderBy('id')->latest()->paginate('5');
    
        return view('admin.pages.posts.index_posts', ['post'=>$post]);
    }

    public function create()
    {
        $category=Category::all();
        return view('admin.pages.posts.create_posts', ['category'=>$category]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title_post'=>'required',
            'picture_post'=>'required|image|mimes:jpg,jpeg,png',
        ]);


        // if($request->file('picture_post')){
        //     $extension=$request->file('picture_post')->getClientOriginalExtension();
        //     $extensionn=$request->file('picture_post')->getClientOriginalName();
        //     $request->file('picture_post')->storeAs('img', $extensionn);
        
        // }

        $picture_file=$request->file('picture_post');
        $picture_original=$picture_file->getClientOriginalName();
        $picture_extension=$picture_file->getClientOriginalExtension();
        $request->file('picture_post')->storeAs('img', $picture_original);
           
        $post=Post::create([
            'title_post'=>$request->title_post,
            'slug'=>Str::slug($request->title_post),
            'body'=>$request->body,
            'categorys_id'=>$request->categorys_id,
            'picture_post'=>$picture_original,
            'is_active'=>$request->is_active,
            'views'=> 0,
        ]);

        return redirect()->route('posts.index')->with('message', 'Data Post Berhasil Di Tambahkan');
    }

    public function edit($id)
    {
        $post=Post::findOrFail($id);
        $category=Category::all();

        return view('admin.pages.posts.edit_posts', ['post'=>$post, 'category'=>$category]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title_post'=>'required',
            'picture_post'=>'mimes:jpg,jpeg,png',
        ]);

            $picture_file=$request->file('picture_post');
            $picture_original=$picture_file->getClientOriginalName();
            $picture_extension=$picture_file->getClientOriginalExtension();
            $picture_file->storeAs('images_post/', $picture_file->getClientOriginalName());
            
            $post=Post::findOrFail($id);

            $post->update([
                'title_post'=>$request->title_post,
                'slug'=>Str::slug($request->title_post),
                'categorys_id'=>$request->categorys_id,
                'picture_post'=>$picture_file,
                'is_active'=>$request->is_active,    
            ]);
            return redirect()->route('posts.index')->with('message', 'Data Post Berhasil Di Update');
    }

    public function destroy($id)
    {
        //$category=DB::table('categorys')->where('id', $id)->delete();
        $post=Post::findOrFail($id);
        $category->delete();

        return redirect()->route('posts.index')->with('message', 'Data Posts Berhasil Di Hapus');
    }
}
