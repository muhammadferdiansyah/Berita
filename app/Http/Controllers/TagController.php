<?php

namespace App\Http\Controllers;

use App\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    
    public function index()
    {
        $tag = Tags::paginate(10);
        return view('admin.tag.index',compact('tag'));
    }

    
    public function create()
    {
        return view('admin.tag.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3'
        ]);

        $tag = Tags::create([
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
        $tag = Tags::findorfail($id);
        return view('admin.tag.edit', compact('tag'));
    }

   
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $tag_data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];

        Tags::whereId($id)->update($tag->name);

        return redirect()->route('tag.index')->with('success', 'tag berhasil disimpan');
    }

    
    public function destroy($id)
    {
        $tag = Tags::findorfail($id);
        $tag->delete();
 
        return redirect()->back()->with('success', 'Tag Berhasil Dihapus');
    }
}
