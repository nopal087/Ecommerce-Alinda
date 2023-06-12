@include('Template/header')
@include('Template/navbar')

<!-- section all-product -->
<section id="all-produk">
    <div class="container">
        <h4 class="text-center mt-4">
            All Product
        </h4>
        <h6 class="text-center mb-5">
            Available for all your needs
        </h6>
        {{-- <div class="pt-3 pb-5 px-lg-5">
            <form class="d-flex">
                <input class="form-control me-2 rounded-pill" type="search" placeholder="cari produk disini"
                    aria-label="Search">
                <button class="btn btn-search rounded-pill" type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div> --}}

        <div class="pt-3 pb-5 px-lg-5">
            <form class="d-flex" action="{{ route('produk.search') }}" method="GET">
                <input class="form-control me-2 rounded-pill" type="search" name="keyword"
                    placeholder="cari produk disini" aria-label="Search">
                <button class="btn btn-search rounded-pill" type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>


        <div class="row">
            @foreach ($data as $item)
                <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                    <div class="card mb-3" data-aos="zoom-in" data-aos-duration="2000">
                        <div class="cek-img">
                            <div class="img-zoom">
                                <a href="/detail-product/{{ $item->id }}" class=" text-decoration-none">
                                    <img src="{{ asset('store/' . $item->foto_produk) }}" class="card-img-top"
                                        alt="foto_produk">
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="hatri">{{ $item->nama_produk }}</h5>
                            <p class="p-pro card-text mb-4 hide lh-sm">
                                {{ substr($item->deskripsi_produk, 0, 50) . '...' }}
                                <a href="/detail-product/{{ $item->id }}" class="text-decoration-none">Lihat
                                    Selengkapnya</a>
                            </p>
                            <div class="card-mbuh d-flex justify-content-between">
                                <p class="hama my-auto">Rp. {{ number_format($item->harga_produk) }}</p>
                                <a href="/detail-product/{{ $item->id }}" class="btn button-card"><i
                                        class="bi bi-bag-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('Template/footer')
