<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Rambo</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="https://kit.fontawesome.com/989b502037.js" crossorigin="anonymous"></script>
        <livewire:styles>
    </head>
    <body class="bg-gray-100">
        <div class="flex">
            {{-- Nav --}}
            <div class="fixed w-1/6 h-screen border-r bg-white">
                <div class="px-3 py-7 border-b bg-red-100">
                    <x-logo />
                </div>
            </div>

            {{-- Content --}}
            <div class="w-full m-5 pl-1/6">
                @yield('content')
            </div>
        </div>

        <livewire:scripts>
    </body>
</html>
