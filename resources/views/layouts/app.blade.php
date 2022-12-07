<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CAFEKU</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="{{ asset('bs/css/bootstrap.css') }}">
    <script src="{{ asset('bs/js/bootstrap.js') }}"></script>
    <script src="{{ asset('bs/js/bootstrap.bundle.min.js') }}"></script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                {{-- MENGATUR TAMPILAN MENU NAVBAR --}}
                @if (!Auth::check())
                    {{-- APABILA TIDAK ADA YANG LOGIN --}}
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <h3><strong>CAFEKU</strong></h3>
                    </a>
                @elseif(Auth::user()->role == 'ADMIN')
                    {{-- APABILA ADA YANG LOGIN NAMUN DENGAN ROLE ADMIN --}}
                    <a class="navbar-brand me-5" href="{{ url('/') }}">
                        <h3><strong>CAFEKU</strong></h3>
                    </a>
                    <a class="nav-link me-3" href="{{ url('/dashboard') }}">
                        Dashboard
                    </a>
                    <a class="nav-link me-3" href="{{ url('/menu') }}">
                        Menu
                    </a>
                    <a class="nav-link me-3" href="{{ url('/kategori') }}">
                        Kategori
                    </a>
                @elseif(Auth::user()->role == 'OWNER'){{-- APABILA ADA YANG LOGIN DENGAN ROLE OWNER --}}
                    <a class="navbar-brand me-5" href="{{ url('/') }}">
                        <h3><strong>CAFEKU</strong></h3>
                    </a>
                    <a class="nav-link me-3" href="{{ url('/dashboard') }}">
                        Dashboard
                    </a>
                    <a class="nav-link me-3" href="{{ url('/menu') }}">
                        Menu
                    </a>
                    <a class="nav-link me-3" href="{{ url('/kategori') }}">
                        Kategori
                    </a>
                    <a class="nav-link me-3" href="{{ url('/user') }}">
                        User
                    </a>
                @endif
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" style="min-height: 80vh">
            @yield('content')
        </main>
        <footer>
            <div class="container-fluid px-5 d-flex justify-content-between bg-dark text-light">
                <h5><strong>CAFEKU</strong></h5>
                <p>Alamat: Jl. Bogor Gang 2, Penanggungan, Klojen, Malang</p>
            </div>
        </footer>
    </div>
</body>

</html>
