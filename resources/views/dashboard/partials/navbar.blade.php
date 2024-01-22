<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand me-auto" href="/">
                Toko Online
            </a>

            <ul class="navbar-nav">
                <li class="nav-item me-5">
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                </li>
                @if (Auth::user()->role_id != 3)
                    <li class="nav-item me-5">
                        <a class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}" aria-current="page"
                            href="/dashboard/{{ Auth::user()->id }}">Dashboard</a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="nav-link {{ Request::is('dashboard/product*') ? 'active' : '' }}"
                            href="/dashboard/products/{{ Auth::user()->id }}">
                            Products
                        </a>
                    </li>
                    @if (Auth::user()->role_id == 1)
                        <li class="nav-item me-5">
                            <a class="nav-link {{ Request::is('dashboard/categori*') ? 'active' : '' }}"
                                href="/dashboard/categories/{{ Auth::user()->id }}">
                                Categories
                            </a>
                        </li>
                        <li class="nav-item me-5">
                            <a href="/dashboard/users/{{ Auth::user()->id }}"
                                class="nav-link {{ Request::is('dashboard/user*') ? 'active' : '' }}">
                                Users
                            </a>
                        </li>
                    @endif
                @else
                    <li class="nav-item me-5">
                        <a class="nav-link {{ Request::is('profile*') ? 'active' : '' }}" aria-current="page"
                            href="/profile/{{ Auth::user()->id }}">profile</a>
                    </li>
                @endif
                <li class="nav-item me-5">
                    <a href="/dashboard/workshops/{{ Auth::user()->id }}"
                        class="nav-link {{ Request::is('dashboard/workshop*') ? 'active' : '' }}">
                        Work Shop
                    </a>
                </li>
                <li class="nav-item me-5">
                    <a href="/logout" class="nav-link">
                        Logout
                    </a>
                </li>
            </ul>
        </div>

    </div>
</nav>
