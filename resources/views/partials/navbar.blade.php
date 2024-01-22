<nav class="navbar navbar-expand-md navbar-dark bg-success sticky-top">
    <div class="container-fluid">
        <span class="navbar-brand">
            Toko Online
        </span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item ">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page"
                        href="/">Home</a>
                </li>
                @if (Auth::user())
                    <li class="nav-item ">
                        <a class="nav-link {{ Request::is('categori*') ? 'active' : '' }}"
                            href="/categories">Categori</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{ Request::is('product*') ? 'active' : '' }}" href="/products">Products</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{ Request::is('about') ? 'active' : '' }} " href="/about">About</a>
                    </li>
                @endif
            </ul>
            <ul class="navbar-nav me-3 mb-2 mb-lg-0">
                @if (Auth::user())
                    @if (Auth::user()->role_id != 3)
                        <li class="nav-item">
                            <a href="/dashboard/{{ Auth::user()->id }}" class="nav-link">Dashboard</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="/profile/{{ Auth::user()->id }}" class="nav-link">Profile</a>
                        </li>
                    @endif
                @endif

                @if (Auth::user())
                    <li class="nav-item">
                        <a href="/logout" class="nav-link">Logout</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
