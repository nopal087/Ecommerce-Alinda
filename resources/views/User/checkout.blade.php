@include('Template/header')
@include('Template/navbar')

<!-- Checkout section -->

<body class="chekk">
    <section id="ceckout">
        <div class="container">
            <div class="row my-3 py-5">
                <div class="col-md-6">
                    <div class="mt-5 mb-3">
                        <h4 class="head-check-out">Detail Order</h4>
                    </div>
                    <form>
                        <div class="form-group">
                            <h6>Nama <span class="head-check-out">*</span></h6>
                            <input type="text" value="{{ Auth::user()->name }}" class="form-control input-1"
                                placeholder="Nama lengkap">
                        </div>
                        <div class="form-group">
                            <h6>Nomor Telephone <span class="head-check-out">*</span></h6>
                            <input type="text" value="{{ Auth::user()->nohp }}" class="form-control input-1"
                                placeholder="Nomor Telp. / WA">
                        </div>
                        <div class="form-group">
                            <h6>Alamat <span class="head-check-out">*</span></h6>
                            <textarea class="form-control input-2" placeholder="Alamat lengkap dan detail" rows="5">{{ Auth::user()->alamat }}</textarea>
                        </div>
                        <div class="form-group">
                            <h6>Pilih Provinsi <span class="head-check-out">*</span></h6>
                            <select class="form-select">
                                <option selected>Pilih Provinsi</option>
                                <option value="1">Jawa Barat</option>
                                <option value="2">Jawa Tengah</option>
                                <option value="3">Jawa Timur</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <h6>Pilih Kota <span class="head-check-out">*</span></h6>
                            <select class="form-select">
                                <option selected>Pilih Kota</option>
                                <option value="1">Solo</option>
                                <option value="2">Sukoharjo</option>
                                <option value="3">Semarang</option>
                            </select>
                        </div>
                    </form>

                    <div class="mt-5 mb-3">
                        <h4 class="head-check-out">Pengiriman</h4>
                    </div>
                    <form>
                        <div class="form-group">
                            <h6>Pilih Ekspedisi <span class="head-check-out">*</span></h6>
                            <select class="form-select">
                                <option selected>Pilih Salah Satu</option>
                                <option value="1">JNE</option>
                                <option value="2">Tiki</option>
                                <option value="3">Pos Indonesia</option>
                            </select>
                        </div>
                    </form>
                </div>

                <div class="col-md-6">
                    <div class="order-tot mt-5 mb-3">
                        <div class="mb-20">
                            <h4 class="head-check-out">Pesanan Anda</h4>
                        </div>
                        <div class="table-responsive text-center">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $productId => $data)
                                        <tr>
                                            <td>
                                                <figure class="justify-content-evenly">
                                                    <img src="{{ asset('store/' . $data['foto_produk']) }}"
                                                        class="figure-img img-fluid rounded" width="30%"
                                                        alt="gambar produk">
                                                    <figcaption class="figure-caption">
                                                        <a href="produk-one.html" class="text-decoration-none">
                                                            <span class="ndasji">{{ $data['nama_produk'] }}</span>
                                                        </a>
                                                    </figcaption>
                                                </figure>
                                            </td>
                                            <td>
                                                <span>{{ $data['jumlah'] }}</span>
                                            </td>
                                            <td>Rp {{ number_format($data['harga_produk']) }}-</td>
                                        </tr>

                                        <tr>
                                            <th>SubTotal</th>
                                            <td colspan="2">Rp 500.000</td>
                                        </tr>
                                        <tr>
                                            <th>Ongkir</th>
                                            <td colspan="2">Rp 20.000</td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td colspan="2"><span class="tot">Rp 520.000</span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="form-check my-3">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Pastikan data yang anda masukan asli
                            </label>
                        </div>
                        <a href="#" class="btn rounded-pill px-4 bayar"><i class="bi bi-cash"></i> Bayar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Checkout section end-->

    @include('Template/footer')
