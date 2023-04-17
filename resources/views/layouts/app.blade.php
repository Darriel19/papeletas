<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css')}}">
        <title>DREP - @yield('titulo')</title>
        <link rel="shortcut icon" href="{{asset('img/logoico.ico')}}">
        <script src="{{ asset('js/app.js')}}" defer ></script>
        @vite('resources/css/app.css')

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>

    <body class="bg-gray-100">
        <header class="p-5 border-b bg-gray-300 shadow">
            <a href="{{route('principal')}}">
                <div class="container mx-auto flex justify-start items-center">

                        <img src="{{asset('img/logo.png')}}" alt="logo-drep" width="200rem">
                        <h1 class="text-3xl font-black ml-5 uppercase">
                            Drep - Permisos
                        </h1>

                </div>
            </a>
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('titulo')
            </h2>

            @yield('contenido')

            
        </main>

        <div>
            @yield('script')
        </div>

        <footer class="text-center p-5 text-gray-500 font-bold uppercase">
            DREP - Todos los derechos reservados &copy {{date('Y')}}
        </footer>
    </body>
</html>
