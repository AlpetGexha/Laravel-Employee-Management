<header class="ud-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="{{ route('index') }}">
                        <img src="{{ asset('assets/images/logo/logo.svg') }}" alt="Logo" />
                    </a>
                    <button class="navbar-toggler">
                        <span class="toggler-icon"> </span>
                        <span class="toggler-icon"> </span>
                        <span class="toggler-icon"> </span>
                    </button>

                    <div class="navbar-collapse">
                        <ul id="nav" class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="ud-menu-scroll {{ request()->routeIs('index') ? 'active' : '' }}"
                                    href="{{ route('index') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="ud-menu-scroll {{ request()->routeIs('about') ? 'active' : '' }}"
                                    href="{{ route('about') }}">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="ud-menu-scroll {{ request()->routeIs('pricing') ? 'active' : '' }}"
                                    href="{{ route('pricing') }}">Pricing</a>
                            </li>
                            <li class="nav-item">
                                <a class="ud-menu-scroll {{ request()->routeIs('blog') ? 'active' : '' }}"
                                    href="{{ route('blog') }}">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="ud-menu-scroll {{ request()->routeIs('contact') ? 'active' : '' }}"
                                    href="{{ route('contact') }}">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="ud-menu-scroll {{ request()->routeIs('dokumentacioni') ? 'active' : '' }}"
                                    href="{{ route('dokumentacioni') }}">Docs</a>
                            </li>
                        </ul>
                    </div>

                    <div class="navbar-btn d-none d-sm-inline-block">
                        @guest
                            <a href="{{ route('filament.company.auth.login') }}" class="ud-main-btn ud-login-btn">
                                Sign In
                            </a>
                            <a class="ud-main-btn ud-white-btn" href="{{ route('filament.company.auth.register') }}">
                                Sign Up
                            </a>
                        @else
                            <a class="ud-main-btn ud-white-btn" href="{{ route('filament.company.auth.login') }}">
                                Dashboard
                            </a>
                        @endguest
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
