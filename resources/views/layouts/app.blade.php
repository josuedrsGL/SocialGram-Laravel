<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css')}}">
        <title>SocialGram - @yield('title')</title>
        <script src="{{asset('js/app.js')}}" defer></script>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gray-100">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">
                    SocialGram
                </h1>
                <nav class="flex gap-2 items-center">
                    <a href="{{route('login')}}" class="font-bold uppercase text-gray-600 text-sm">Login</a>
                    <a href="{{ route('register') }}" class="font-bold uppercase text-gray-600 text-sm">Sign Up</a>
                </nav>
            </div>
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">@yield('title')</h2>
            @yield('content')
        </main>

        <footer class="text-center p-5 text-gray-500 font-bold">
            SocialGram - Todos los derechos reservados {{now()->year}} 
        </footer>
        
    </body>
</html>