<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\Produk;
use Illuminate\Http\Request;

class CartController extends Controller
{

    // untuk menampilkan data cart kedalam halaman keranjang
    public function showCart()
    {
        $cartItems = CartModel::all();

        return view('User.cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $namaProduk = $request->input('nama_produk');
        $hargaProduk = $request->input('harga_produk');
        $fotoProduk = $request->input('foto_produk');

        // Cek apakah produk sudah ada di keranjang belanja
        $cartItem = CartModel::where('id', $productId)->first();

        if ($cartItem) {
            // Jika produk sudah ada di keranjang belanja, tingkatkan jumlahnya
            $cartItem->jumlah++;
            $cartItem->save();
        } else {
            // Jika produk belum ada di keranjang belanja, buat entri baru
            $cartItem = new CartModel();
            $cartItem->id = $productId;
            $cartItem->nama_produk = $namaProduk;
            $cartItem->harga_produk = $hargaProduk;
            $cartItem->foto_produk = $fotoProduk;
            $cartItem->jumlah = 1;
            $cartItem->save();
        }

        return redirect()->route('cart.add'); // Ganti 'cart' dengan nama rute yang sesuai untuk halaman cart
    }
}
