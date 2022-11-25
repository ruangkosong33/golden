<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $category=DB::table('categories')->orderBy('id')->paginate('7');

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

        DB::table('categories')->insert([
            'title_category'=>$request->title_category,
            'slug'=>Str::slug($request->title_category),
        ]);

        return redirect()->route('category.index')->with('message', 'Data Kategori Berhasil Di Tambahkan');
    }

    public function edit($id)
    {
        $category=DB::table('categories')->where('id', $id)->first();

        return view('admin.pages.category.edit_category', ['category'=>$category]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title_category'=>'required',
        ]);

        DB::table('categories')->where('id',$request->id)->update([
            'title_category'=>$request->title_category,
            'slug'=>Str::slug($request->title_category),
        ]);

        return redirect()->route('category.index')->with('message', 'Data Kategori Berhasil Di Update');
    }

    public function destroy($id)
    {
        $category=DB::table('categories')->where('id', $id)->delete();

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

