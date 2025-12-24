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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // 1. Check if we have a saved scroll position
                var savedScroll = sessionStorage.getItem('scroll_pos');                

                // 2. If we do, scroll to it immediately
                if (savedScroll) {
                    window.scrollTo(0, savedScroll);
                    // 3. Clear the storage so it doesn't happen on other pages
                    sessionStorage.removeItem('scroll_pos');
                }
            });

            // 4. Listen for ANY form submission on the page
            document.addEventListener("submit", function(e) {
                // Save the current scroll Y position specifically for form submits
                sessionStorage.setItem('scroll_pos', window.scrollY);
            });
        </script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
