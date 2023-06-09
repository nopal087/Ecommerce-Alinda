<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class UserProdukController extends Controller
{
    public function UserProduk(Request $request)
    {
        $data = Produk::latest()->get();
        return view('User.all-product', compact('data'));
    }

    public function previewProduk(Request $request)
    {
        $data = Produk::limit(4)->get();
        return view('User.index', compact('data'));
    }
}
