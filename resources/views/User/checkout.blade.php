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
                        <form>
                            <div class="form-group">
                                <h6>Pilih Provinsi <span class="head-check-out">*</span></h6>
                                <select class="form-select" name="province">
                                    <option selected disabled>Pilih Provinsi</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province['province_id'] }}">{{ $province['province'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <h6>Pilih Kota <span class="head-check-out">*</span></h6>
                                <select class="form-select" name="city">
                                    <option selected disabled>Pilih Kota</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city['city_id'] }}">{{ $city['city_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>

                        <div class="mt-5 mb-3">
                            <h4 class="head-check-out">Pengiriman</h4>
                        </div>
                        <form>
                            <div class="form-group">
                                <h6>Pilih Ekspedisi <span class="head-check-out">*</span></h6>
                                <select class="form-select" name="courier">
                                    <option selected disabled>Pilih Salah Satu</option>
                                    @foreach ($couriers as $courier)
                                        <option value="{{ $courier['code'] }}">{{ $courier['name'] }}</option>
                                    @endforeach
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
                                    @php
                                        $subtotal = 0;
                                        $ongkir = 20000;
                                        
                                        // Hitung total harga
                                        $totalHarga = $subtotal + $ongkir;
                                    @endphp


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
                                            <td>Rp {{ number_format($data['harga_produk'] * $data['jumlah']) }}-</td>
                                        </tr>
                                        @php
                                            $subtotal += $data['harga_produk'] * $data['jumlah'];
                                        @endphp
                                    @endforeach

                                    <tr>
                                        <th>SubTotal</th>
                                        <td colspan="2">Rp {{ number_format($subtotal) }}</td>
                                    </tr>

                                    <tr>
                                        <th>Ongkir</th>
                                        <td colspan="2">Rp {{ number_format($ongkir, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td colspan="2"><span class="tot">Rp
                                                {{ number_format($totalHarga + $subtotal, 0, ',', '.') }}</span></td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>

                        <div class="form-check my-3">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">
                                Pastikan data yang anda masukan asli
                            </label>
                        </div>
                        <a href="#" class="btn rounded-pill px-4 bayar" id="pay-button"><i class="bi bi-cash"></i>
                            Bayar</a>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Checkout section end-->

    {{-- <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    // alert("payment success!");
                    window.location.href = '/'
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });

        var myToast = document.querySelector('.toast');
        var bsToast = new bootstrap.Toast(myToast);
        bsToast.show();
    </script> --}}




    @include('Template/footer')
