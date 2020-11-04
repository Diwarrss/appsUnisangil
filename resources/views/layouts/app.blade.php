<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tics - Admin') }}</title>

    <link href="storage/img/favicon.png" rel="icon">
    <!-- Styles -->{{-- Cuando este autenticado --}}
    @auth
        <link href="{{ asset('css/allCoreui.css') }}" rel="stylesheet">
    @endauth
    {{-- Cuando sea un invitado no auth --}}
    @guest
        <!-- All css template home -->
        <link href="{{ asset('css/allHome.css') }}" rel="stylesheet">
    @endguest
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <div id="app">
        {{-- Cuando este autenticado --}}
        @auth
            <!-- Barra Navegación Top Header -->
            <headeradmin csrf="{{ csrf_token() }}"></headeradmin>
            <div class="app-body">
                <sidebard><sidebard>
            </div>
            <!-- llamamos el componete que cargara todo el contenido de la pagina admin -->
            <router-view></router-view>
            <footeradmin></footeradmin>

        @endauth
        {{-- Cuando sea un invitado no auth --}}
        @guest
            <nav class="navbar navbar-expand-md shadow-sm" style="background: #f5f8fd">
                <div class="container">
                    @php
                      $title = Request::path() !== 'login-vortal' ? 'Sistemas y Tics' : 'Desarrollo Estratégico y Calidad';
                    @endphp
                    <a class="navbar-brand" href="#">
                      {{$title}}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                              @if (Request::path() !== 'login-vortal')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                              @endif
                                {{-- @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif --}}
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="py-5">
                @yield('content')
            </main>
            <footerhome></footerhome>
        @endguest
    </div>
</body>
    {{-- Cuando este autenticado --}}
    @auth
        <script src="{{ asset('js/allCoreui.js') }}"></script>
        <script src="{{ asset('js/appAdmin.js') }}"></script>
    @endauth
    {{-- Cuando sea un invitado no auth --}}
    @guest
        <!-- JavaScript Libraries -->
        <script src="{{asset('/js/allHome.js')}}"></script>
        <script src="{{asset('/js/appHome.js')}}"></script>
    @endguest
</html>
