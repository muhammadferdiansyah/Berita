<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   
    public function index()
    {
        $user = User::paginate(10);
        return view('admin.user.index', compact('user'));
    }

   
    public function create()
    {
        return view('admin.user.create');
    }

   
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3',
            'email' => 'required|email',
            'tipe' => 'required'
        ]);

        if($request->input('password')){
            $password = bcrypt($request->password);
        }
        else {
            $password = bcrypt('123');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'tipe' => $request->tipe,
            'password' => $password
        ]);

        return redirect()->back()->with('success', 'User berhsil disimpan');

    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|min:3',
            'email' => 'required'
        ]);

        if($request->input('password')){
          $user_data=[
            'name' => $request->name,
            'tipe' => $request->tipe,
            'password' => bcrypt($request->password)
          ];
        }
        else {
            $user_data = [
                'name' => $request->name,
                'tipe' => $request->tipe
            ];
        }

        $user = User::find($id);
        $user->update($user_data);

        return redirect()->route('user.index')->with('success', 'User berhasil diupdate');
    }

   
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('success', 'User berhasil diupdate');
    }
}
