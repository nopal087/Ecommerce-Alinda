<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class UserProdukController extends Controller
{
    public function UserProduk(Request $request)
    {
        $data = Produk::all();
        return view('User.all-product', compact('data'));
    }
}
