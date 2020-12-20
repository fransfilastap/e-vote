<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        window.addEventListener('swal', function(e) {
            swal.fire(e.detail);
        });

    </script>

    @livewireStyles

</head>

<body class="bg-gray-50">
    <div class="font-sans antialiased text-gray-900">
        {{ $slot }}
    </div>

    <footer class="flex flex-col items-center">
        <p class="text-xs text-gray-500">Baked with ❤️ by Data dan Informasi</p>
    </footer>
    @stack('modals')

    @livewireScripts
    @stack('scripts')
</body>

</html>
