<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <style>
            .bg-custom {
              background-color: #15161D;
              display: flex;
              align-items: center;
              padding: 1%;
            }
            .bg-custom-logo {
              display: flex;
              justify-content: center;
              align-items: center;
            }
            .bg-custom-title{
                display: flex;
                color: w;
            }
          </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-custom shadow">
                    <!-- LOGO -->
                    <div class="col-md-2 bg-custom-logo">
                        <div class="header-logo">
                            <a href="{{ route('dashboard') }}" class="logo">
                                <img src="../img/logomd.png" alt=""  style="width: 50px">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->
                    <div class="bg-custom-title">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
