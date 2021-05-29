<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Rambo</title>
        <link href="{{ asset('vendor/rambo/css/app.css') }}" rel="stylesheet">
        <link rel="shortcut icon" href="{{ asset('vendor/rambo/images/favicon.png') }}">
    </head>
    <body class="auth">
        <div class="content">
            @yield('content')
        </div>

        @livewireScripts
    </body>
</html>
