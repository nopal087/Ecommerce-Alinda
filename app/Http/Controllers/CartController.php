<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\Order;
use App\Models\Produk;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

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
        $quantity = $request->input('jumlah');

        // Mendapatkan keranjang saat ini dari sesi pengguna
        $cart = session()->get('cart', []);

        // Mengecek apakah produk sudah ada di keranjang belanja
        if (isset($cart[$productId])) {
            // Jika produk sudah ada di keranjang, tingkatkan jumlahnya
            $cart[$productId]['jumlah']++;
            // Jika produk sudah ada di keranjang, tingkatkan jumlahnya
            // $cart[$productId]['quantity'] += $quantity;
        } else {
            // Jika produk belum ada di keranjang, buat entri baru
            $cart[$productId] = [
                'product_id' => $productId,
                'nama_produk' => $namaProduk,
                'harga_produk' => $hargaProduk,
                'foto_produk' => $fotoProduk,
                'quantity' => $quantity,
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



    public function showCheckoutForm(Request $request)
    {
        $cart = session()->get('cart', []);

        $subtotal = 0;
        $ongkir = 20000;

        // Hitung subtotal
        foreach ($cart as $productId => $data) {
            $subtotal += $data['harga_produk'] * $data['jumlah'];
        }

        // Ubah harga ongkir menjadi 27.000 jika subtotal lebih dari 50.000
        if ($subtotal > 50000) {
            $ongkir = 27000;
        }

        // Hitung total harga
        $totalHarga = $subtotal + $ongkir;





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


            $response = Http::withHeaders([
                'key' => '396ac24530a45de4a72c826072b2587f', // Ganti dengan API Key Anda dari Raja Ongkir
            ])->get('https://api.rajaongkir.com/starter/courier');

            $responseData = $response->json();

            if (isset($responseData['rajaongkir']['results'])) {
                $couriers = $responseData['rajaongkir']['results'];
            } else {
                // Jika data kurir tidak ditemukan, atur $couriers menjadi array kosong
                $couriers = [
                    ['code' => 'jne', 'name' => 'JNE'],
                    ['code' => 'pos', 'name' => 'POS'],
                    ['code' => 'tiki', 'name' => 'TIKI'],
                ];
            }


            // cek ongkir

            $originCityName = 'Demak'; // Ganti dengan nama kota asal pengiriman

            $response = Http::withHeaders([
                'key' => '396ac24530a45de4a72c826072b2587f', // Ganti dengan API Key Anda dari Raja Ongkir
            ])->get('https://api.rajaongkir.com/starter/city', [
                'province' => '', // Biarkan kosong jika tidak ingin memfilter berdasarkan provinsi
                'city' => $originCityName, // Nama kota asal pengiriman
            ]);

            $responseData = $response->json();

            if (isset($responseData['rajaongkir']['results'])) {
                $originCityCode = $responseData['rajaongkir']['results'][0]['city_id'];
            } else {
                // Kode kota asal pengiriman tidak ditemukan
                $originCityCode = null;
            }


            // return $request->all();;
            $request->request->add(['status' => 'Unpaid', 'payment_id' => uniqid()]); //add request
            // dd($request->all());
            // $order = Order::create($request->all());

            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details' => array(
                    'order_id' => '1',
                    'gross_amount' => '10000'
                ),
                'customer_details' => array(
                    'first_name' => $request->nama,
                    'last_name' => ' ',
                    'phone' => $request->phone,
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);


            // Pass the provinces data to the view
            return view('User.checkout', compact('cart', 'provinces', 'cities', 'couriers'));
        } catch (Exception $e) {
            // Handle error if there's an issue fetching data from the API
            return response()->json(['error' => 'Failed to fetch provinces'], 500);
        }
    }








    // public function checkout(Request $request)
    // {
    //     // return $request->all();;
    //     $request->request->add(['status' => 'Unpaid', 'payment_id' => uniqid()]); //add request
    //     // dd($request->all());
    //     // $order = Order::create($request->all());

    //     // Set your Merchant Server Key
    //     \Midtrans\Config::$serverKey = config('midtrans.server_key');
    //     // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    //     \Midtrans\Config::$isProduction = false;
    //     // Set sanitization on (default)
    //     \Midtrans\Config::$isSanitized = true;
    //     // Set 3DS transaction for credit card to true
    //     \Midtrans\Config::$is3ds = true;

    //     $params = array(
    //         'transaction_details' => array(
    //             'order_id' => '1',
    //             'gross_amount' => '10000'
    //         ),
    //         'customer_details' => array(
    //             'first_name' => $request->nama,
    //             'last_name' => ' ',
    //             'phone' => $request->phone,
    //         ),
    //     );

    //     $snapToken = \Midtrans\Snap::getSnapToken($params);
    //     return view('User.checkout', compact('snapToken'));
    // }

    // fungsi midtrans callback untuk melakukan reques apakah pesanan yang telah dipesan sudah berhasil atau tidak dengan menampilkan status pesanan lunas atau belum lunas.
    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'settlement' or $request->transaction_status == 'capture') {
                $order = Order::where('payment_id',  $request->order_id)->first();
                $order->update(['status' => 'Paid']);
            }
        }
    }
}
