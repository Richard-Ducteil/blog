<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="icon" href="images/r.png" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased pt-10 pb-16 md:pb-32  ">

<div id="preloader" class="fixed inset-0 flex items-center justify-center bg-white z-50">
    <img src="images/r.png" alt="Logo" class="w-40 h-40 animate-pulse">
</div>

    {{-- Conteneur global --}}
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" >
    {{-- Header --}}
    <header class="flex justify-between items-center space-x-5 text-slate-900">
        {{-- Logo --}}
        <a href="{{ route('index') }}">
            <picture>
                <source srcset="images/r.png" type="image/webp">
                <source srcset="images/r.png" type="image/jpeg">
                <img src="images/r.png" alt="Logo R.K" class="max-w-[150px] h-auto sm:max-w-[120px] lg:max-w-[180px] object-contain">
            </picture>
        </a>

        {{-- Formulaire de recherche --}}
        <form action="{{ route('index') }}" class="pb-3 pr-2 flex items-center border-b border-b-slate-300 text-slate-300 focus-within:border-b-slate-900 focus-within:text-slate-900 transition">
            <input id="search" value="{{ request()->search }}" class="px-2 w-full outline-none leading-none placeholder-slate-400" type="search" name="search" placeholder="Rechercher un article">
            <button>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                    <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                </svg>
            </button>
        </form>

        {{-- Navigation --}}
        <nav x-data="{ open: false }" x-cloak class="relative">
                <button
                    @click="open = !open"
                    @click.outside="if (open) open = false"
                    @class([
                        'w-8 h-8 flex rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2',
                        'md:hidden' => Auth::guest(),
                    ])
                >
            @auth
            <img class="h-8 w-8 rounded-full" src="{{ Gravatar::get(Auth::user()->email) }}" alt="Image de profil">
                    @else
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                </svg>
                @endauth
            </button>
            <ul
                x-show="open"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                @class([
                        'absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none',
                        'md:hidden' => Auth::guest(),
                    ])
                    tabindex="-1"
            >
            @auth
                    <li><a href="{{ route('home') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mon compte</a></li>
                    <li><a href="{{ route('logout') }}" @click.prevent="$refs.logout.submit()" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Déconnexion</a></li>
                    <form x-ref="logout" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                    @else
                <li><a href="{{route('login')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Connexion</a></li>
                <li>
                    <a href="{{ route('register')}}" class="flex items-center px-4 py-2 font-semibold text-sm text-indigo-700 hover:bg-gray-100">
                        Inscription
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 ml-1">
                            <path fill-rule="evenodd" d="M2 10a.75.75 0 01.75-.75h12.59l-2.1-1.95a.75.75 0 111.02-1.1l3.5 3.25a.75.75 0 010 1.1l-3.5 3.25a.75.75 0 11-1.02-1.1l2.1-1.95H2.75A.75.75 0 012 10z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </li>
                @endauth
            </ul>
            @guest
            <ul class="hidden md:flex space-x-12 font-semibold">
                <li><a href="{{route('login')}}">Connexion</a></li>
                <li>
                    <a href="{{ route('register')}}" class="flex items-center group text-indigo-700">
                        Inscription
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-1 group-hover:ml-2 group-hover:mr-0 transition-all">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                        </svg>
                    </a>
                </li>
            </ul>
            @endguest
        </nav>
    </header>
    @if (session('status'))
        <div class="mt-10 rounded-md bg-green-50 p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">{{ session('status') }}</p>
                </div>
            </div>
        </div>
        @endif
        <main class="mt-10 md:mt-12 lg:mt-16">
            {{ $slot }}
        </main>
</div>

</body>
</html>