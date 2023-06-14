<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\Produk;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

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




    // public function showcheckout()
    // {
    //     $cart = session()->get('cart', []);

    //     return view('User.checkout', compact('cart'));
    // }


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



    // API RAJA ONGKIR

    // public function showCheckoutForm()
    // {
    //     // Create an instance of Guzzle HTTP client
    //     $client = new Client();

    //     try {
    //         // Send a GET request to the Raja Ongkir API endpoint to fetch provinces
    //         $response = $client->get('https://api.rajaongkir.com/starter/province', [
    //             'headers' => [
    //                 'key' => '396ac24530a45de4a72c826072b2587f'
    //             ]
    //         ]);

    //         // Decode the JSON response and extract the provinces data
    //         $responseData = json_decode($response->getBody(), true);
    //         $provinces = $responseData['rajaongkir']['results'];

    //         // Pass the provinces data to the view
    //         return view('User.checkout', compact('provinces'));
    //     } catch (Exception $e) {
    //         // Handle error if there's an issue fetching data from the API
    //         return response()->json(['error' => 'Failed to fetch provinces'], 500);
    //     }
    // }



    public function showCheckoutForm()
    {

        $cart = session()->get('cart', []);

        // Create an instance of Guzzle HTTP client
        $client = new Client();

        try {
            // Send a GET request to the Raja Ongkir API endpoint to fetch provinces
            $response = $client->get('https://api.rajaongkir.com/starter/province', [
                'headers' => [
                    'key' => '396ac24530a45de4a72c826072b2587f'
                ]
            ]);

            // Decode the JSON response and extract the provinces data
            $responseData = json_decode($response->getBody(), true);
            $provinces = $responseData['rajaongkir']['results'];

            // Send a GET request to the Raja Ongkir API endpoint to fetch cities
            $responseCities = $client->get('https://api.rajaongkir.com/starter/city', [
                'headers' => [
                    'key' => '396ac24530a45de4a72c826072b2587f'
                ]
            ]);

            // Decode the JSON response and extract the cities data
            $responseDataCities = json_decode($responseCities->getBody(), true);
            $cities = $responseDataCities['rajaongkir']['results'];

            // Pass the provinces data to the view
            return view('User.checkout', compact('cart', 'provinces', 'cities'));
        } catch (Exception $e) {
            // Handle error if there's an issue fetching data from the API
            return response()->json(['error' => 'Failed to fetch provinces'], 500);
        }
    }



    // public function showCheckoutForm()
    // {
    //     // Create an instance of Guzzle HTTP client
    //     $client = new Client();

    //     try {
    //         // Send a GET request to the Raja Ongkir API endpoint to fetch provinces
    //         $responseProvinces = $client->get('https://api.rajaongkir.com/starter/province', [
    //             'headers' => [
    //                 'key' => '396ac24530a45de4a72c826072b2587f'
    //             ]
    //         ]);

    //         // Decode the JSON response and extract the provinces data
    //         $responseDataProvinces = json_decode($responseProvinces->getBody(), true);
    //         $provinces = $responseDataProvinces['rajaongkir']['results'];

    //         // Send a GET request to the Raja Ongkir API endpoint to fetch cities
    //         $responseCities = $client->get('https://api.rajaongkir.com/starter/city', [
    //             'headers' => [
    //                 'key' => '396ac24530a45de4a72c826072b2587f'
    //             ]
    //         ]);

    //         // Decode the JSON response and extract the cities data
    //         $responseDataCities = json_decode($responseCities->getBody(), true);
    //         $cities = $responseDataCities['rajaongkir']['results'];

    //         // Send a GET request to the Raja Ongkir API endpoint to fetch shipping couriers
    //         $responseCouriers = $client->get('https://api.rajaongkir.com/starter/courier', [
    //             'headers' => [
    //                 'key' => '396ac24530a45de4a72c826072b2587f'
    //             ]
    //         ]);

    //         // Decode the JSON response and extract the shipping couriers data
    //         $responseDataCouriers = json_decode($responseCouriers->getBody(), true);
    //         $couriers = $responseDataCouriers['rajaongkir']['results'];

    //         // Pass the provinces, cities, and couriers data to the view
    //         return view('User.checkout', compact('provinces', 'cities', 'couriers'));
    //     } catch (Exception $e) {
    //         // Handle error if there's an issue fetching data from the API
    //         return response()->json(['error' => 'Failed to fetch data from Raja Ongkir API'], 500);
    //     }
    // }
}
