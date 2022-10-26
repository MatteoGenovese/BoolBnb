<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> BoolBnb @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('storage/asset/img/logo.jpg') }}" alt="brand logo">
                </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link text-decoration-none text-secondary" href="{{ url('/') }}">
                        Home
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-decoration-none text-secondary mx-lg-2" href="{{ url('/ricerca-avanzata') }}">
                        Ricerca
                    </a>
                  </li>
                  @auth()
                    <li class="nav-item">
                        <a class="nav-link text-decoration-none text-secondary position-relative" href="{{ route("user.apartments.index") }}">
                            <span class=" {{ request()->routeIs('user.apartments.index') ? 'nav-brand-active' : '' }}">I tuoi annunci</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-decoration-none text-secondary position-relative mx-lg-2" href="{{ route('user.apartments.create') }}">
                            <span class=" {{ request()->routeIs('user.apartments.create') ? 'nav-brand-active' : '' }}">Crea</span>
                        </a>
                    </li>
                  @endauth

                <!-- Guest not registered, Authentication Links -->
            </ul>
            @guest
                <div class="d-lg-flex">
                    <div class="nav-item d-block d-lg-inline position-relative text-secondary mx-2">
                        <a class="nav-link mx-lg-2 {{ request()->routeIs('login') ? 'nav-brand-active' : '' }}" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </div>
                    @if (Route::has('register'))
                        <div class="nav-item d-block d-lg-inline position-relative text-secondary my-2 m-lg-0">
                            <a class="nav-link mx-lg-2 {{ request()->routeIs('register') ? 'nav-brand-active' : '' }}" href="{{ route('register') }}">Registrati</a>
                        </div>
                    @endif
                </div>
                
            @else
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle brand-color-prime" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </div>
            @endguest
              </div>
            </div>
          </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @yield('bottom-scripts')
</body>
</html>
