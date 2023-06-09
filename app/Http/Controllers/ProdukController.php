<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function Produk(Request $request)
    {
        $data = Produk::latest()->get();
        return view('admin.product', compact('data'));
    }

    public function create()
    {
        return view('admin.product');
    }

    public function store(Request $request)
    {
        $data = Produk::create($request->all());
        if ($request->hasFile('foto_produk')) {
            $filename = time() . '.' . $request->file('foto_produk')->getClientOriginalExtension();
            $request->file('foto_produk')->move(public_path('/store'), $filename);
            $data->foto_produk = $filename;
            $data->save();
        }
        return redirect('/Product');
    }

    public function edit($id)
    {
        $data = Produk::find($id);
        return view('/Product', compact('data'));
    }
    public function update($id, Request $request)
    {
        $data = Produk::find($id);
        $data->update($request->all());
        if ($request->hasFile('foto_produk')) {
            $filename = time() . '.' . $request->file('foto_produk')->getClientOriginalExtension();
            $request->file('foto_produk')->move(public_path('store/'), $filename);
            $data->foto_produk = $filename;
            $data->save();
        }
        $data->save;
        return redirect('/Product');
    }
    public function delete($id)
    {
        $data = Produk::find($id);
        $data->delete();
        return redirect('/Product');
    }
}
