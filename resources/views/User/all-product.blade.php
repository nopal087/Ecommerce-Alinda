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
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                <div class="card mb-3" data-aos="zoom-in" data-aos-duration="2000">
                    <div class="cek-img">
                        <div class="img-zoom">
                            <a href="/detail-product" class=" text-decoration-none">
                                <img src="{{ asset('img/1.jpg') }}" class="card-img-top" alt="...">
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="hatri">Benang Jahit</h5>
                        <p class="p-pro card-text mb-4 hide lh-sm">Barang yang kami jual merupakan produk dari toko kami
                        </p>
                        <div class="card-mbuh d-flex justify-content-between">
                            <p class="hama my-auto">Rp.500.000</p>
                            <a href="/cart" class="btn button-card"><i class="bi bi-bag-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('Template/footer')
