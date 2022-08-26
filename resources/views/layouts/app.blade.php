<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
   
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid" id="nav">
                <img style="width : 100px;" src="{{ asset('images/logo.jpg') }}" alt="logo">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Boutique de vêtements Laravel
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/home">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/article">Catalogue</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/gamme">Gammes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/campagne">Promotions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/panier">Panier</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="">Favoris</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="/a_propos">A propos</a>
                        </li>



                    </ul>
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('S\'enregistrer') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('compte') }}">Mon compte</a>
                            </li>
                            @if (Auth::user() && Auth::user()->role_id == 2)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.index') }}">ADMINISTRATEUR</a>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nom }}
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
        <div class="container-fluid text-center p-4" id="header">
            <h1>La boutique magique de Laravel</h1>
            <img src="{{ asset('images/header.jpg') }}" alt="logo">
            
        </div>
        
        

        {{-- Les messages d'erreurs --}}
        <div class="container w-50 text-center p-3">
            @if (session()->has('message'))
                <p class="alert alert-success">{{ session()->get('message') }}</p>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
    <footer>
        <div class="container-fluid" id="footer">
            <img style="width : 100px;" src="{{ asset('images/logo.jpg') }}" alt="logo">
            <div class="copyright">
                <p>Boutique de vêtements Laravel - 2022. Fait par Floriane Siedlecki</p>
            </div>
        </div>
    </footer>
</body>

</html>
