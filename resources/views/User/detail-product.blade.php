@include('Template/header')
{{-- @include('Template/navbar') --}}

<!-- section product-one -->
<section id="cart-one">
    <div class="container">
        <h4 class="text-center hanam-cart mt-4">
            Detail Product
        </h4>
        <h6 class="text-center mb-5">
            Our product details
        </h6>
        <div class="row">
            <div class=" col-sm-6 col-md-6 col-lg-6 mb-3">
                <div class="one-produk" data-aos="fade-right" data-aos-duration="2000">
                    <div class="mx-auto cek-img">
                        <div class="img-zoom">
                            <img src="{{ asset('store/' . $produk->foto_produk) }}" class="card-img-top"
                                alt="foto produk">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 mb-3">
                <div class="" data-aos="fade-left" data-aos-duration="2000">
                    <div class="">
                        <h2 class="hadwa-pro-one">{{ $produk->nama_produk }}</h2>
                    </div>

                    <div class="border-top border-bottom pt-4 pb-3 top-hatpat-pro-one">
                        <h4 class="hatpat-pro-one">Rp.{{ number_format($produk->harga_produk) }}-</h4>
                    </div>

                    <div class="p-pro-one mt-3">
                        <p>{{ $produk->deskripsi_produk }}</p>
                    </div>

                    <div class="text-pro-one fw-light my-5">
                        <p><i class="bi bi-gear"></i> 2 Bulan Garansi Alinda Store</p>
                        <p><i class="bi bi-arrow-clockwise"></i> Batas return barang 1 minggu</p>
                        <p><i class="bi bi-credit-card"></i></i> Tersedia pembayaran cash dan tranfer</p>
                    </div>

                    {{-- <div class="">
                        <a href="/cart" class="btn rounded-pill px-4 py-2 btn-add-cart">Add to cart <i
                                class="bi bi-arrow-right"></i></a>
                    </div> --}}
                    <form action="/cart" method="POST" id="add-to-cart-form">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $produk->id }}">
                        <input type="hidden" name="foto_produk" value="{{ $produk->foto_produk }}">
                        <input type="hidden" name="nama_produk" value="{{ $produk->nama_produk }}">
                        <input type="hidden" name="harga_produk" value="{{ $produk->harga_produk }}">
                        <button type="submit" class="btn rounded-pill px-4 py-2 btn-add-cart">Add to cart <i
                                class="bi bi-arrow-right"></i></button>
                    </form>

                </div>
            </div>

            <div class="border-top py-4 mt-4 mb-2 col-sm-12 col-md-12 col-lg-12">
                <div>
                    <h4 class="text-center head-related-produk">- Related product -</h4>
                </div>
            </div>
            @foreach ($data as $item)
                <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                    <div class="card mb-3" data-aos="zoom-in" data-aos-duration="2000">
                        <div class="cek-img">
                            <div class="img-zoom">
                                <a href="/detail-product/{{ $item->id }}" class=" text-decoration-none">
                                    <img src="{{ asset('store/' . $item->foto_produk) }}" class="card-img-top"
                                        alt="...">
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="hatri">{{ $item->nama_produk }}</h5>
                            <p class="p-pro card-text mb-4 hide lh-sm">{{ $item->deskripsi_produk }}</p>
                            <div class="card-mbuh d-flex justify-content-between">
                                <p class="hama my-auto">Rp.{{ number_format($item->harga_produk) }}-</p>
                                <a href="/cart" class="btn button-card"><i class="bi bi-bag-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <a href="/all-product" class="ap mt-5 text-decoration-none">
                <p class="text-center">see more products <i class="my-auto bi bi-arrow-right"></i></p></i>
            </a>
        </div>
</section>
<!-- section product-one end-->

@include('Template/footer')
