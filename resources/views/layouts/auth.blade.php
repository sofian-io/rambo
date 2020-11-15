<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Rambo</title>
        <link href="{{ asset('vendor/rambo/css/app.css') }}" rel="stylesheet">
        <script src="https://kit.fontawesome.com/989b502037.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-gray-100">
        <div class="flex">
            <div class="w-full">
                @yield('content')
            </div>
        </div>
        @livewireScripts
    </body>
</html>
