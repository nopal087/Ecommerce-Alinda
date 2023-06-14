<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{

    // untuk menampilkan data cart kedalam halaman keranjang
    // public function showCart()
    // {
    //     $cartItems = CartModel::all();
    //     $user = auth()->user();
    //     $cartItems = CartModel::where('id', $user->id)->get();
    //     return view('User.cart', compact('cartItems'));
    // }

    public function showCart()
    {
        $cartItems = session()->get('cart', []);

        return view('User.cart', compact('cartItems'));
    }




    public function showcheckout()
    {
        $cart = session()->get('cart', []);

        return view('User.checkout', compact('cart'));
    }


    // public function addToCart(Request $request)
    // {
    //     $productId = $request->input('product_id');
    //     $namaProduk = $request->input('nama_produk');
    //     $hargaProduk = $request->input('harga_produk');
    //     $fotoProduk = $request->input('foto_produk');

    //     // Cek apakah produk sudah ada di keranjang belanja
    //     $cartItem = CartModel::where('id', $productId)->first();

    //     if ($cartItem) {
    //         // Jika produk sudah ada di keranjang belanja, tingkatkan jumlahnya
    //         $cartItem->jumlah++;
    //         $cartItem->save();
    //     } else {
    //         // Jika produk belum ada di keranjang belanja, buat entri baru
    //         $cartItem = new CartModel();
    //         $cartItem->id = $productId;
    //         $cartItem->nama_produk = $namaProduk;
    //         $cartItem->harga_produk = $hargaProduk;
    //         $cartItem->foto_produk = $fotoProduk;
    //         $cartItem->jumlah = 1;
    //         $cartItem->save();
    //     }

    //     return redirect()->route('cart.add'); // Ganti 'cart' dengan nama rute yang sesuai untuk halaman cart
    // }

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $namaProduk = $request->input('nama_produk');
        $hargaProduk = $request->input('harga_produk');
        $fotoProduk = $request->input('foto_produk');

        // Mendapatkan keranjang saat ini dari sesi pengguna
        $cart = session()->get('cart', []);

        // Mengecek apakah produk sudah ada di keranjang belanja
        if (isset($cart[$productId])) {
            // Jika produk sudah ada di keranjang, tingkatkan jumlahnya
            $cart[$productId]['jumlah']++;
        } else {
            // Jika produk belum ada di keranjang, buat entri baru
            $cart[$productId] = [
                'product_id' => $productId,
                'nama_produk' => $namaProduk,
                'harga_produk' => $hargaProduk,
                'foto_produk' => $fotoProduk,
                'jumlah' => 1
            ];

            // Menyimpan item ke dalam database jika belum ada
            CartModel::firstOrCreate(['id' => $productId], [
                'nama_produk' => $namaProduk,
                'harga_produk' => $hargaProduk,
                'foto_produk' => $fotoProduk,
                'jumlah' => 1
            ]);
        }

        // Menyimpan keranjang baru ke sesi pengguna
        session()->put('cart', $cart);

        return redirect()->route('cart'); // Ganti 'cart' dengan nama rute yang sesuai untuk halaman cart
    }
}
