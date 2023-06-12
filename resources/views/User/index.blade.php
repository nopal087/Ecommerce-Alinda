@include('Template/header')
@include('Template/navbar')

<!-- Hero section -->
<section id="hero">
    <div class="container">
        <div class="row flex-lg-row-reverse my-3 py-5">
            <div class="col-lg-6 mt-5">
                <img src="{{ asset('img/hero.png') }}" alt="" data-aos="fade-up-left" data-aos-duration="3000"
                    class="hero img-fluid mx-auto d-block">
            </div>

            <div class="col-lg-6 mt-lg-5">
                <h2 class="display-5 hawan fw-bold my-4 lh-1" data-aos="fade-up-right" data-aos-duration="1000">
                    Temukan Produk dengan Kualitas Terbaik Hanya di Alinda Store
                </h2>
                <p class="lead partu text-break" data-aos="fade-up-right" data-aos-duration="2000">
                    Telusuri berbagai macam produk-produk kami untuk keperluan menjahitmu disini dan temukan produk
                    kami yang
                    cocok untuk Anda!
                </p>
                <div class="mt-5">
                    <a href="/all-product" class="btn button-hero btn-lg rounded-pill" data-aos="fade-up-right"
                        data-aos-duration="3000">start to buy <i class="bi bi-arrow-right my-auto"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero section end-->

<!-- keterangan section -->
<section id="keterangan">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h1 class="hawan-ket text-center" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-anchor-placement="top-bottom">
                    Kami menawarkan <img src="{{ asset('img/svg/benang.svg') }}" class="benang" alt="">
                    berbagai
                    macam perlengkapan
                    kebutuhan
                    menjahit, serta bebas biaya konsultasi mengenai instalasi <img
                        src="{{ asset('img/svg/mesin_jahit.svg') }}" class="jahit" alt=""> mesin jahit.
                </h1>
            </div>
        </div>
    </div>
</section>
<!-- keterangan section end-->

<!-- Product section -->
<section id="product">
    <div class="container ">
        <h4 class="hampat-product text-center mt-auto">
            ━ PRODUCT ━
        </h4>
        <h6 class="text-center mb-5">
            Available for all your needs
        </h6>
        <div class="row">
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
                            <p class="p-pro card-text mb-4 hide lh-sm">
                                {{ substr($item->deskripsi_produk, 0, 50) . '...' }}
                                <a href="/detail-product/{{ $item->id }}"
                                    class="p-pro card-text mb-4 hide lh-sm text-decoration-none">Lihat Selengkapnya</a>
                            </p>
                            <div class="card-mbuh d-flex justify-content-between">
                                <p class="hama my-auto">Rp.{{ number_format($item->harga_produk) }}</p>
                                <a href="cart.html" class="btn button-card"><i class="bi bi-bag-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <a href="/all-product" class="ap mt-5 text-decoration-none">
                <p class="text-center">see more products <i class="my-auto bi bi-arrow-right"></i></p></i>
            </a>
        </div>
    </div>
</section>
<!-- Product section end-->

<!-- Store section -->
<section id="store">
    <div class="container">
        <h4 class="hampat-store text-center">
            ━ STORE LOCATION ━
        </h4>
        <h6 class="hanam-store text-center mb-5">
            Let's come to our shop
        </h6>

        <div class="row justify-content-center">
            <div class="map col-sm-12 col-md-12 col-lg-12">
                <div class="muappppp rounded-3" data-aos="flip-left" data-aos-easing="ease-out-cubic"
                    data-aos-duration="2000">
                    <iframe class="google-map rounded-3"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3182.6069609100437!2d111.0332809!3d-6.8311489!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70cd0199a479dd%3A0xfa0e80d9acd0cfb3!2sToko%20Alinda!5e1!3m2!1sid!2sid!4v1684217747044!5m2!1sid!2sid"
                        width="700" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Store section end -->

<!-- Contact section -->
<section id="contact" class="contact">
    <div class="container">
        <h4 class="hampat-contact text-center">
            ━ Contact Us ━
        </h4>
        <h6 class="hanam-contact text-center mb-5">
            Contact us for more info
        </h6>

        <div class="row">
            <div class=" col-lg-6 ">
                <div class="col-lg-12 col-md-12">
                    <div class="box-contact mb-2" data-aos="fade-up-right" data-aos-duration="1000">
                        <a href="#store"><i class="icon bi bi-geo-alt-fill"></i></a>
                        <h3>Alamat Toko</h3>
                        <p>Desa. Mojolawaran, Kec. Gabus, Kabupaten Pati, Jawa Tengah 59173</p>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="box-contact mb-2" data-aos="fade-up-right" data-aos-duration="2000">
                        <a href="#"><i class="icon bi bi-telephone"></i></a>
                        <h3>WhatsApp</h3>
                        <p>+6285 875 391 295</p>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="box-contact mb-2" data-aos="fade-up-right" data-aos-duration="3000">
                        <a href="#"><i class="icon bi bi-envelope"></i></a>
                        <h3>E-mail</h3>
                        <p>alindastore@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <form class="mail-form" data-aos="fade-up-left" data-aos-duration="3000">
                    <div class="mb-5 row">
                        <div class="col form-group">
                            <input type="text" name="name" class="form-control rounded-pill" id="name"
                                placeholder="Your Name" required>
                        </div>
                        <div class="col form-group">
                            <input type="email" class="form-control rounded-pill" name="email" id="email"
                                placeholder="Your Email" required>
                        </div>
                    </div>
                    <div class="mb-5 form-group">
                        <input type="text" class="form-control rounded-pill" name="subject" id="subject"
                            placeholder="Subject" required>
                    </div>
                    <div class="mb-5 form-group">
                        <textarea class="form-control rounded-3" name="message" rows="5" placeholder="Message" required></textarea>
                    </div>
                    <div class="mt-4 text-center"><button class="btn button-send btn-lg rounded-pill shadow"
                            type="submit">Send
                            Message</button></div>
                </form>
            </div>
        </div>
    </div>

</section>
<!-- Contact section end-->

@include('Template/footer')
