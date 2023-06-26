@include('Template/header')

<body class="constal">
    <!-- section login -->
    <div class="container">
        <div class="row py-lg-5 mt-lg-4">
            <div class="col-lg-6 mt-lg-5">
                <img src="{{ asset('img/svg/sign_in.svg') }}" alt="" class="hero-1 img-fluid mx-auto d-block">
            </div>

            <div class="col-lg-6 mt-lg-5">
                <form class="p-4 form-log-sign" method="POST" action="{{ route('registrasi_action') }}">
                    @csrf
                    <h3>Sign Up</h3>
                    <p>Registrasi terlebih dahulu</p>
                    <div class="mb-2">
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                            placeholder="Username" required>
                    </div>
                    <div class="mb-2">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                            placeholder="Email" required>
                    </div>
                    <div class="mb-2">
                        <input type="text" name="nohp" value="{{ old('nohp') }}" class="form-control"
                            placeholder="Nomor Hp" required>
                    </div>
                    <div class="mb-2">
                        <input type="text" name="alamat" value="{{ old('alamat') }}" class="form-control"
                            placeholder="Alamat" required>
                    </div>
                    {{-- <div class="mb-4">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div> --}}

                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" name="password" id="floatingPassword"
                            placeholder="Password">
                        <label for="floatingPassword">Password</label>
                        <span id="togglePassword" class="password-toggle"><i class="far fa-eye-slash"></i></span>
                    </div>

                    <div class="mb-4">
                        <input type="hidden" name="role" value="user" class="form-control" placeholder="role"
                            required>
                    </div>
                    <div class="checkbox mb-3">
                        <button class="w-100 btn button-log-sign px-5 rounded-pill" type="submit">Sign Up</button>
                        <p class="text-center mt-2">Sudah punya akun?
                            <a href="{{ route('login') }}" class="cek text-decoration-none">Log In</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- section login end-->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- menampilkan mata untuk hide and show password --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var togglePassword = document.getElementById('togglePassword');
            var passwordInput = document.getElementById('floatingPassword');
            var passwordToggleIcon = togglePassword.querySelector('i');

            togglePassword.addEventListener('click', function() {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    passwordToggleIcon.classList.remove('far', 'fa-eye');
                    passwordToggleIcon.classList.add('far', 'fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    passwordToggleIcon.classList.remove('far', 'fa-eye-slash');
                    passwordToggleIcon.classList.add('far', 'fa-eye');
                }
            });
        });
    </script>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
