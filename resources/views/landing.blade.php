<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Up</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-200">
    <main class="grid grid-cols-2 gap-2 h-screen">
        <div >
            <img src="{{asset('/img/logo.png')}}" alt="Logo PostUp">
        </div>

        <div class="">
        @auth
            <a href="{{ route('dashboard') }}">Ir al dashboard</a>
        @else
            <div class="flex flex-col items-center justify-center my-24">
                <h1 class="text-6xl mb-20 font-semibold">The world is talking</h1>
                <h2 class="text-4xl mb-10 font-semibold">Be part of it.</h2>
                
                <a href="{{ route('register') }}" class="w-fit px-4 py-2 bg-sky-400 rounded-full text-white hover:bg-sky-600 hover:cursor-pointer text-md font-bold text-center">Create account</a>
                <p class="my-2 flex item">Or</p>
                <a href="{{ route('login') }}" 
                class="w-fit px-4 py-2 bg-sky-400 rounded-full text-white hover:bg-sky-600 hover:cursor-pointer text-md font-bold text-center">Sign in</a>
            </div>

        @endauth
            </div>
    </main>
</body>
</html>
