<!-- navabar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-lg">
    <div class="container my-1">
        <a href="/"><img src="{{ asset('img/alinda_store.png') }}" class="logo" alt="" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="menu navbar-nav mx-auto justify-content-center me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="#hero" class="active nav-link menu-nav px-2">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#product" class="nav-link menu-nav px-2">Product</a>
                </li>
                <li class="nav-item">
                    <a href="#store" class="nav-link menu-nav px-2">Store</a>
                </li>
                <li class="nav-item">
                    <a href="#contact" class="nav-link menu-nav px-2">Contact</a>
                </li>
            </ul>

            <ul class="menu navbar-nav">
                <li class="nav-item">
                    <a href="/cart" class="btn me-2 nav-icon"><i class="bi bi-cart-fill"></i></a>
                </li>
                <li class="nav-item">
                    <a href="/account-user" class=" btn nav-icon"><i class="bi bi-person-fill"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- navabar end -->
