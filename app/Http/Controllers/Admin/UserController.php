<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Peran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users', ['users'=>User::with('peran')->get()]);
    }

    public function create()
    {
        return view('admin.users-create', ['perans'=>Peran::all()]);
    }

    public function store(Request $r)
    {
        User::create([
            'nama_lengkap'=>$r->nama,
            'email'=>$r->email,
            'password'=>Hash::make($r->password),
            'peran_id'=>$r->peran_id
        ]);
        return redirect()->route('admin.users');
    }

    public function edit($id)
    {
        return view('admin.users-edit', [
            'user'=>User::findOrFail($id),
            'perans'=>Peran::all()
        ]);
    }

    public function update(Request $r,$id)
    {
        User::where('id',$id)->update([
            'nama_lengkap'=>$r->nama,
            'email'=>$r->email,
            'peran_id'=>$r->peran_id
        ]);
        return redirect()->route('admin.users');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return back();
    }
}
