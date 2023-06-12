@include('Template/header')
@include('Template/navbar')


<!-- section cart -->
<section id="cart">
    <div class="container">
        <h6 class="text-center hanam-cart my-5">
            selangkah lagi barang ini akan bisa jadi milikmu
        </h6>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table-cart table text-center ">
                            <thead>
                                <tr class="main-heading">
                                    <th scope="col">Produk</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Jumlah Barang</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Hapus</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($cartItems as $data)
                                    <tr>
                                        <td class="align-middle">
                                            <figure class="pt-4 figure d-flex justify-content-evenly">
                                                <img src="{{ asset('store/' . $data->foto_produk) }}"
                                                    class="figure-img img-fluid rounded" alt="gambar produk">
                                                <figcaption class="figure-caption">
                                                    <a href="produk-one.html" class="text-decoration-none">
                                                        <h4 class="hampat-cart">{{ $data->nama_produk }}</h4>
                                                    </a>
                                                    <p class="p-cart">Barang yang kami jual merupakan produk dari toko
                                                        kami
                                                    </p>
                                                </figcaption>
                                            </figure>
                                        </td>

                                        <td class="align-middle">
                                            <span>Rp.{{ number_format($data->harga_produk) }},-</span>
                                        </td>

                                        <td class="align-middle">
                                            <div class="up-down m-auto">
                                                <button class="btn btn-sm btn-updown" id="add">+</button>
                                                <input class="border input rounded-3" type="text" id="qtyBox"
                                                    readonly="" value="{{ $data->jumlah }}">
                                                <button class="btn btn-sm btn-updown" id="sub">-</button>
                                            </div>
                                        </td>

                                        <td class="align-middle">
                                            <span>Rp.Belum dibuat kodenya,-</span>
                                        </td>

                                        <td class="align-middle">
                                            <a href="#" class="trash">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-action py-5 text-end">
                        <a href="#" class="btn rounded-pill px-4 py-2 next-buy">Beli sekarang <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

</section>
<!-- section cart end -->
@include('Template/footer')
