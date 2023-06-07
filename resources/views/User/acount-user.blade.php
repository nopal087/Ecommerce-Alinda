@include('Template/header')
@include('Template/navbar')

<!-- section acoount -->
<section id="account">
    <div class="container">
        <div class=" row">
            <div class="col-md-4 mt-5">
                <ul class="nav menu-ul-account flex-column" id="nav-option">
                    <!-- my account -->
                    <li class="nav-item">
                        <a class="nav-link menu-account" data-bs-toggle="tab" href="#my-account">
                            <i class="bi bi-person me-3"></i>Account
                        </a>
                    </li>
                    <!-- end -->

                    <!-- my addres -->
                    <li class="nav-item">
                        <a class="nav-link b menu-account" data-bs-toggle="tab" href="#address">
                            <i class="bi bi-pin-map me-3"></i> Alamat
                        </a>
                    </li>
                    <!-- end -->

                    <!-- order -->
                    <li class="nav-item">
                        <a class="nav-link b menu-account" data-bs-toggle="tab" href="#orders">
                            <i class="bi bi-truck me-3"></i> Order
                        </a>
                    </li>
                    <!-- end -->

                    <!-- log out -->
                    <li class="nav-item">
                        <a class="nav-link a menu-account" href="login.html">
                            <i class="bi bi-box-arrow-right me-3"></i> Logout
                        </a>
                    </li>
                    <!-- end -->
                </ul>
            </div>

            <div class="col-md-8 mt-5">
                <div class="active show mb-3">
                    <div class="card-account">
                        <!-- <h5 class="">Hello Rifqy!</h5> -->
                        <p class="pt-3 px-3"><span class="hallo align-bottom">Hallo Rifqy, </span>Selamat datang di
                            halaman profil kamu, dihalaman ini kamu bisa melihat account kamu, alamat kamu, dan melihat
                            orderanmu</p>
                    </div>
                </div>
                <div class="tab-content">
                    <!-- my account -->
                    <div class="tab-pane active fade" id="my-account">
                        <div class="card-account">
                            <h5 class="head-account text-center py-3">My Account</h5>
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Nama <span class="required">*</span></label>
                                            <input required="" class="form-control" name="name" type="text">
                                        </div>
                                        <div class="mt-3 form-group col-md-12">
                                            <label>Email <span class="required">*</span></label>
                                            <input required="" class="form-control" name="email" type="email">
                                        </div>
                                        <div class="mt-3 form-group col-md-12">
                                            <label>No. Hp <span class="required">*</span></label>
                                            <input required="" class="form-control" name="tel" type="tel">
                                        </div>
                                        <div class="mt-3 form-group col-md-12">
                                            <label class="pt-2">Password <span class="required">*</span></label>
                                            <input required="" class="form-control" name="password" type="password">
                                        </div>
                                        <div class="mt-3 form-group psw col-md-12">
                                            <label class="pt-2">Password Baru <span class="required">*</span></label>
                                            <input required="" class="form-control" name="npassword" type="password">
                                        </div>
                                        <div class="mt-2 form-group col-md-12">
                                            <label class="pt-2">Konfirmasi Password <span
                                                    class="required">*</span></label>
                                            <input required="" class="form-control" name="cpassword" type="password">
                                        </div>
                                        <div class="mt-5 text-center col-md-12">
                                            <button type="submit" class="btn button-save px-5 py-2 rounded-pill"
                                                name="submit" value="Submit">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end -->

                    <!-- my addres -->
                    <div class="tab-pane fade" id="address">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-account">
                                    <h5 class="head-account text-center py-3">Alamat</h5>
                                    <div class="card-body">
                                        <address>Desa. Bunderan 02/01, Kec. Wonosalam
                                            Kab. Demak <br><br> 59571
                                        </address>
                                        <a href="#" class="edit">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end -->

                    <!-- order -->
                    <div class="tab-pane fade" id="orders">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-account">
                                    <h5 class="head-account text-center py-3">Orderan</h5>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Produk</th>
                                                        <th>Tanggal</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Benang Jahit</td>
                                                        <td>27 April 2023</td>
                                                        <td>Completed</td>
                                                        <td>Rp. 500.000</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section acoount end-->

@include('Template/footer')
