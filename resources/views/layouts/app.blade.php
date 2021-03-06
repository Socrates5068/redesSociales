<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://trix-editor.org/js/attachments.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('scripts')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    {{-- Botones redes sociales --}}
	<div class="social">
		<a href="https://twitter.com/SistemasPotosi" target="blank"><img class="mb-3" src="https://socialsistemas.com/images/twitter.svg" alt="twitter"></a>
		<a href="https://www.facebook.com/Ingenier%C3%ADa-de-sistemas-103785118245947/" target="blank"><img class="mb-3" src="https://socialsistemas.com/images/facebook.svg" alt="facebook"></a>
		<a href="https://t.me/joinchat/GXDeBDZ0XA3hVe_j" target="blank"><img src="https://socialsistemas.com/images/telegram.svg" alt="telegram"></a>
	</div>

    {{-- Nav bar --}}
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-s">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" 
                                        href="{{ route('perfiles.show', ['perfil' => Auth::user()->id]) }}">
                                        {{ __('Ver Perfil') }}
                                    </a>
                                    <a class="dropdown-item" 
                                        href="{{ route('perfiles.edit', ['perfil' => Auth::user()->id]) }}">
                                        {{ __('Editar Perfil') }}
                                    </a>                              
                                    <a class="dropdown-item" 
                                        href="{{ route('comunicados.index') }}">
                                        {{ __('Administrar Comunicados') }}
                                    </a>
                                    @if(Auth::user()->isAdmin())
                                        
                                        <a class="dropdown-item" 
                                            href="{{ route('usuarios.index') }}">
                                            {{ __('Administrar Usuarios') }}
                                        </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('hero')

        <div class="container">
            <div class="row">
                <main class="py-4 mt-5 col-12">
                    @yield('botones')
                </main>
                <main class="py-4 mt-5 col-12">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>
</html>
