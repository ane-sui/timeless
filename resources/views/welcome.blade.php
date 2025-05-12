<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
        @endif
    </head>
    <body>
        {{-- <div class="grid sm:grid-cols-12 gap-4 m-3 ">
            <div class="sm:col-span-2 min-h-[100px] rounded-lg bg-orange-500 sm:block hidden"> </div>
            <

        <div class="grid sm:grid-cols-2 gap-4 m-4">
            <div class="bg-cyan-500 min-h-[350px] shadow rounded-lg "> </div>
            <div class="bg-green-500 min-h-[350px] shadow rounded-lg ">
                <div class="bg-white p-5 m-3 rounded ">
                    hello World
                </div>
            </div>
        </div>

    </body>
</html>
