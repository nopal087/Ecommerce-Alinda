@include('Template/header')

<body class="constal">
    <!-- section login -->
    <div class="container">
        <div class="row py-lg-5 mt-lg-4">
            <div class="col-lg-6 mt-lg-5">
                <img src="{{ asset('img/svg/sign_in.svg') }}" alt="" class="hero-1 img-fluid mx-auto d-block">
            </div>

            <div class="col-lg-6 mt-lg-5">
                <form class="p-4 form-log-sign">
                    <h3>Sign Up</h3>
                    <p>Registrasi terlebih dahulu</p>
                    <div class="mb-2">
                        <input type="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="mb-2">
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="mb-2">
                        <input type="nohp" class="form-control" placeholder="Nomor Hp">
                    </div>
                    <div class="mb-4">
                        <input type="password" class="form-control" placeholder="Password">
                    </div>

                    <div class="checkbox mb-3">
                        <button class="w-100 btn button-log-sign px-5 rounded-pill" type="submit">Sign Up</button>
                        <p class="text-center mt-2">Sudah punya akun?
                            <a href="login.html" class="cek text-decoration-none">Log In</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- section login end-->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
