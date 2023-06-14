<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProdukController extends Controller
{
    // menampilkan semua data produk pada halaman all-produk
    public function UserProduk(Request $request)
    {
        $data = Produk::latest()->get();
        return view('User.all-product', compact('data'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $data = Produk::where('nama_produk', 'like', "%$keyword%")->get();
        return view('User.all-product', compact('data'));
    }


    //menampilkan data produk dihalaman index, dan hanya ditampilkan 4 produk untuk preview saja
    public function previewProduk(Request $request)
    {
        $data = Produk::limit(4)->get();
        return view('User.index', compact('data'));
    }


    //menampilkan detail produk dihalaman detail produk , mengambil data sesuai id produk
    public function detailProduk($id, Request $request)
    {
        $data = Produk::limit(4)->get();
        $produk = Produk::find($id);
        return view('User.detail-product', compact('produk', 'data'));
    }


    public function accountUser()
    {
        $user = Auth::User();
        return view('User.acount-user', compact('user'));
    }
}
