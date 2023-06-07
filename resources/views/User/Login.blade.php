<!DOCTYPE html>
<html lang="en">

@include('Template/header')

<body class="constal">
    <!-- section login -->
    <div class="container">
        <div class="row py-lg-5 mt-lg-4">
            <div class="col-lg-6 mt-lg-5">
                <img src="{{ asset('img/svg/login.svg') }}" alt="" class="hero-1 img-fluid mx-auto d-block">
            </div>

            <div class="col-lg-6 mt-lg-5">
                <form class="form-log-sign p-4 mt-4 shadow-lg">
                    <h3>Log In</h3>
                    <p class="mb-4">Silahkan log in dan selamat berbelanja</p>
                    <div class="form-floating mb-2">
                        <input type="email" class="form-control" id="floatingInput" placeholder="Email">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="checkbox mb-3">
                        <button class="w-100 btn button-log-sign px-5 rounded-pill" type="submit">Log In</button>
                        <p class="text-center mt-2">Belum punya akun?
                            <a href="/registrasi" class="cek text-decoration-none">Sign Up</a>
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
