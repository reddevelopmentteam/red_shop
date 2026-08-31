<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Space+Grotesk:wght@300..700&display=swap"
    rel="stylesheet">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>

    @livewireStyles
</head>

<body class="min-h-screen flex flex-col">
    <header class="sticky top-0 w-full flex justify-center z-50">
        <livewire:home.navbar class="relative" />
    </header>
    <main class="flex-1">
        {{ $slot }}
    </main>

    @livewireScripts
    <footer
        class="bg-linear-to-t from-brand-tertiary/70 from-0% to-white to-50% flex justify-center">
        <livewire:home.footer />
    </footer>
</body>

</html>
