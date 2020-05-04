<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @include('layouts.inc.css')

</head>
<body>
    <div id="app">
{{ Request()->path() }}
        @if (Auth::user() != null)
            <!-- Navbar -->
            <x-nav-bar />
            @include('layouts.inc.mensajes.accion')
            <!-- Navbar -->
        @endif
        
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include('layouts.inc.js')
</body>
</html>
