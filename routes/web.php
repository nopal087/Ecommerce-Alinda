<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserProdukController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('User/index');
});
Route::get('/cart', function () {
    return view('User/cart');
});
Route::get('/all-product', function () {
    return view('User/all-product');
});
// Route::get('/detail-product', function () {
//     return view('User/detail-product');
// });
Route::get('/account-user', function () {
    return view('User/acount-user');
});
// Route::get('/login', function () {
//     return view('User/Login');
// });


//untuk menampilkan semua produk pada halaman all-product
Route::get('/all-product', [UserProdukController::class, 'UserProduk']); //untuk menampilkan semua produk pada halaman all-product
//untuk menampilkan preview produk pada halaman index
Route::get('/', [UserProdukController::class, 'previewProduk']);

//untuk menampilkan relate produk pada halaman detailproduct
Route::get('/detail-product/{id}', [UserProdukController::class, 'relateProduk']);

// Menampilkan halaman detail produk berdasarkan ID
Route::get('/detail-product/{id}', [UserProdukController::class, 'detailProduk']);

//route untuk melakukan pencarian produk
Route::get('/produk/search,', [UserProdukController::class, 'search'])->name('produk.search');

// menambahkan produk kehalaman keranjang
// Route::post('/cart', [CartController::class, 'addToCart'])->name('cart.add');
// Route::get('/cart', [CartController::class, 'showCart'])->name('cart');


// authentication | login register
Route::get('/registrasi', [AuthController::class, 'register'])->name('register');
Route::post('/registrasi_action', [AuthController::class, 'registrasi_action'])->name('registrasi_action');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login_action', [AuthController::class, 'login_action'])->name('login_action');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    // Rute yang hanya dapat diakses oleh pengguna yang sudah login
    // Route::get('/', [UserProdukController::class, 'previewProduk']);

    // keranjang
    Route::post('/cart', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart');

    // checkout
    Route::get('/checkout', [CartController::class, 'showcheckout'])->name('checkout');
    Route::get('/checkout', [CartController::class, 'showCheckoutForm'])->name('checkoutForm');
    // Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    // Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
    // Route::get('/checkout', [CartController::class, 'getCouriers'])->name('checkoutForm');

    // Route::get('/checkout', [CheckoutController::class, 'checkout']);
    // Route::post('/checkout', [CheckoutController::class, 'checkout']);

    // bagian admin
    Route::get('/Product', [ProdukController::class, 'Produk']);
    Route::get('/Product/create', [ProdukController::class, 'create']);
    Route::post('/Product/store', [ProdukController::class, 'store']);
    Route::get('/Product/{id}/edit', [Sellerontroller::class, 'edit']);
    Route::put('/Product/{id}', [ProdukController::class, 'update']);
    Route::delete(
        '/Product/{id}',
        [ProdukController::class, 'delete']
    );

    Route::get('/dashboard', function () {
        return view('admin/beranda');
    });
    Route::get('/Transaksi', function () {
        return view('admin/transaksi');
    });
    Route::get('/Product', function () {
        return view('admin/product');
    });
    Route::get('/Pesanan', function () {
        return view('admin/pesanan');
    });

    // Route::get('/checkout', function () {
    //     return view('User/checkout');
    // });


    //bagian pemilik
    Route::get('/pemilik', function () {
        return view('admin/pemilik/dashboard_pemilik');
    });

    Route::get(
        '/pengguna',
        [PemilikController::class, 'pengguna']
    );


    //CRUD bagian pemilik
    Route::get('/pengguna', [PemilikController::class, 'pengguna']);
    Route::get('/pengguna/create', [PemilikController::class, 'create']);
    Route::post('/pengguna/store', [PemilikController::class, 'store']);
    Route::get('/pengguna/{id}/edit', [PemilikController::class, 'edit'])->name('pengguna.edit');
    Route::put('/pengguna/{id}', [PemilikController::class, 'update']);
    Route::delete('/pengguna/{id}', [PemilikController::class, 'delete'])->name('pengguna.delete');
});


// 