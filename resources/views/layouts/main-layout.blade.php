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

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />
        <div class="min-h-screen bg-gray-100">
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
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
        <script>
            function filterResults() {
    
                let href = 'all-listings?';
                var title = document.getElementById("title").value;
                var country = document.getElementById("country").value;
                var category = document.getElementById("category").value;
                var maxPrice = document.getElementById("maxPrice").value;
    
                if (title.length) {
                    href += 'filter[title]=' + title;
                }
                if (category.length) {
                    href += '&filter[category_id]=' + category
                }
                if (country.length) {
                    href += '&filter[country_id]=' + country
                }
                if (maxPrice.length) {
                    href += '&filter[max_price]=' + maxPrice
                }
    
                document.location.href = href;
            }
            document.getElementById("filter").addEventListener("click", filterResults);
        </script>
    </body>
</html>
