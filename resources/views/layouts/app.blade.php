<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'testProject') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="/css/app.css" rel="stylesheet">
    <!-- <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet"> -->
    @livewireStyles
</head>
<body class="bg-white">
    <div id="app">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <nav class="relative flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg bg-gray-600 mb-3">
            <div class="px-4 flex flex-grow justify-between">
                <a class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-gray-100 no-underline flex items-center hover:bg-gray-dark justify-start" href="{{ url('/') }}">
                    {{ config('app.name', 'testProject') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse flex justify-end" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav flex px-2 items-center ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item flex flex-column px-2 text-gray-100">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item flex flex-column px-2 text-gray-100">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <div class="group relative inline-block text-center" id="dropdown">                                
                                    <button class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-100 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-gray-500">
                                        <img src="/uploads/{{ Auth::user()->photo }}" style="width:20px; height:20px; float:left; border-radius:50%;">
                                        <span class="pl-2">{{ Auth::user()->firstName }}</span>
                                    <!-- Heroicon name: solid/chevron-down -->
                                        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>                                
                                <div class="absolute hidden group-hover:block origin-top-right right-0 mt-4 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5" id="dropdown-menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem" href="{{ route('profile') }}">{{ __('My Profile') }}</a>
                                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem" href="{{ route('posts') }}">{{ __('Posts') }}</a>
                                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                </div>
                            </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="pt-20">
            @yield('content')
        </main>
    </div>
    @livewireScripts
    <script type="text/javascript">
        window.addEventListener('click', function(e){
            if (document.getElementById('dropdown').contains(e.target)){
                document.getElementById('dropdown').onclick = function() {
                     if ( document.getElementById("dropdown-menu").classList.contains('block') ){
                        document.getElementById("dropdown-menu").classList.add('hidden');
                        document.getElementById("dropdown-menu").classList.remove('block');
                    }
                    else{                
                        document.getElementById("dropdown-menu").classList.add('block');
                        document.getElementById("dropdown-menu").classList.remove('hidden');
                    }
                }
            }
            else{
                document.getElementById("dropdown-menu").classList.add('hidden');
                document.getElementById("dropdown-menu").classList.remove('block');
            }
        })
    </script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
      crossorigin="anonymous"
    >
    </script>
</body>
</html>
