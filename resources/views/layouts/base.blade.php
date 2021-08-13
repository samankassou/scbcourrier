<!DOCTYPE html>
<html :class="{ 'dark': dark }" x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @hasSection('title')

            <title>@yield('title') - {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }}</title>
        @endif

        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ url(asset('favicon.jpeg')) }}">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">
        <link rel="stylesheet" href="{{ asset('vendor/izitoast/css/iziToast.min.css') }}">
        <style>
            /* Toggle A */
            input:checked~.dot {
                transform: translateX(100%);
                background-color: rgb(217, 119, 6);
            }
        </style>
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ url(mix('js/app.js')) }}" defer></script>
        <script src="{{ asset('template/js/init-alpine.js') }}"></script>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body>
        @yield('body')

        <script src="{{ asset('vendor/izitoast/js/iziToast.min.js') }}"></script>
        @livewireScripts
        @livewire('livewire-ui-modal')
        @stack('scripts')
    </body>
</html>
