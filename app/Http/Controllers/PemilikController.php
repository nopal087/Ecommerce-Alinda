<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PemilikController extends Controller
{
    public function pengguna()
    {
        $pengguna = User::latest()->get();
        return view('admin.pemilik.pengguna', compact('pengguna'));
    }
    public function create()
    {
        return view('admin.pemilik.pengguna');
    }

    public function store(Request $request)
    {
        $pengguna = User::create($request->all());
        return redirect('/pengguna');
    }

    public function edit($id)
    {
        $pengguna = User::find($id);
        return view('admin.pemilik.edit_pengguna', compact('pengguna'));
    }
    public function update($id, Request $request)
    {
        $pengguna = User::find($id);
        $pengguna->update($request->all());
        $pengguna->save();
        return redirect('/pengguna');
    }
    public function delete($id)
    {
        $pengguna = User::find($id);
        if ($pengguna) {
            $pengguna->delete();
        }
        return redirect('/pengguna');
    }
}
