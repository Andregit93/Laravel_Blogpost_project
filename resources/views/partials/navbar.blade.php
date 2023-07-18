<nav class="navbar navbar-expand-lg py-lg-4">
    <div class="container">
        <a class="navbar-brand me-5 pe-5 fs-2 text-primary fw-bold" href="/">SevtianBlog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto ml-lg-0 fs-5 align-items-lg-center">
                <li class="nav-item me-3">
                    <a class="nav-link {{ Request::is('/') ? 'active fw-bold fs-5' : 'text-secondary' }}"
                        href="/">Home</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link {{ Request::is('about') ? 'active fw-bold fs-5' : 'text-secondary' }}"
                        href="/about">About</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link {{ Request::is('blog*' ) ? 'active fw-bold fs-5' : 'text-secondary' }}"
                        href="/blog">Blog</a>
                </li>
                <li class="nav-item me-4 mb-2 mb-sm-0">
                    <a class="nav-link {{ Request::is('categories*') ? 'active fw-bold fs-5' : 'text-secondary' }}"
                        href="/categories">Categories</a>
                </li>
                @auth
                <li class="nav-item dropdown text-center">
                    <a class="nav-link login-link navbar-btn py-1 px-3 active fw-bold fs-6" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Welcome {{ auth()->user()->name }} <i class="bi bi-caret-down-fill"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window me-1"></i>
                                My Dashboard</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right me-1"></i>
                                    Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link login-link navbar-btn navbar-btn-in py-1 px-4 active fw-bold fs-6"
                        href="/login">Login</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
