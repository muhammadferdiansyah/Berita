<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    
    public function index()
    {
        $category = Category::paginate(10);
        return view('admin.category.index',compact('category'));
    }

   
    public function create()
    {
        return view('admin.category.create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3'
        ]);

        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->back()->with('success', 'Kategori berhasil disimpan');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
       $category = Category::findorfail($id);
       return view('admin.category.edit', compact('category'));
    }

   
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $category_data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];

        Category::whereId($id)->update($category->name);

        return redirect()->route('category.index')->with('success', 'Kategori berhasil disimpan');
    }

    
    public function destroy($id)
    {
       $category = Category::findorfail($id);
       $category->delete();

       return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}
