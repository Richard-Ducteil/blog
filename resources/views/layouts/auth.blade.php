<!DOCTYPE html>
<html lang="fr" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased h-full">
<div class="flex min-h-screen flex-col justify-center py-12 bg-gradient-to-br from-blue-100 to-blue-200 sm:px-6 lg:px-8">
    <div class="flex justify-center mb-4">
        <a href="{{ route('index') }}">
        <picture>
                
                <source srcset="images/r.png" type="image/webp">
                <source srcset="images/r.png" type="image/jpeg">
                <img src="images/r.png" alt="Logo R.K" class="max-w-[150px] h-auto sm:max-w-[120px] lg:max-w-[180px] object-contain">
            </picture>
        </a>
    </div>

    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white rounded-xl shadow-lg p-8 transition-transform transform hover:scale-105">
            <h2 class="text-center text-2xl font-bold text-gray-700 mb-6">Bienvenue !</h2>
            <form action="{{ $action }}" method="POST" novalidate>
                @csrf
                <div class="space-y-4">
                    {{ $slot }}

                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-400 px-4 py-2 text-sm font-semibold text-white shadow-md hover:bg-indigo-500 transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            {{ $submitMessage }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


</body>
</html>