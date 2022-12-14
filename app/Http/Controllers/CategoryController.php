<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $category=Category::orderBy('id', 'desc')->paginate('5');
        //$category=DB::table('categorys')->orderBy('id')->paginate('7');

        return view('admin.pages.category.index_category', ['category'=>$category]);
    }

    public function create()
    {
        return view('admin.pages.category.create_category');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title_category'=>'required|min:4',
        ]);

        $request['password']=Hash::make($request->password);
        //DB::table('categorys')->insert([
        $category=Category::create([
            'title_category'=>$request->title_category,
            'slug'=>Str::slug($request->title_category),
        ]);

        return redirect()->route('category.index')->with('message', 'Data Kategori Berhasil Di Tambahkan');
    }

    public function edit($id)
    {
        //$category=DB::table('categorys')->where('id', $id)->first();
        $category=Category::findOrFail($id);

        return view('admin.pages.category.edit_category', ['category'=>$category]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title_category'=>'required',
        ]);
        //DB::table('categorys')->where('id',$request->id)->update([
        $category=Category::find($id);

        $category->update([
            'title_category'=>$request->title_category,
            'slug'=>Str::slug($request->title_category),
        ]);

        return redirect()->route('category.index')->with('message', 'Data Kategori Berhasil Di Update');
    }

    public function destroy($id)
    {
        //$category=DB::table('categorys')->where('id', $id)->delete();
        $category=Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')->with('message', 'Data Kategoi Berhasil Di Hapus');
    }

    public function search(Request $request)
    {
        if($request->has('search')){

            $kode=DB::table('kode')->where('title_category', 'LIKE', '%'.$request->search.'%')
                                   ->paginate(5);
        }else {
            $category=Category::all();
        }

        return view('admin.pages.category.index_category', ['category'=>$category]);
    }
}

