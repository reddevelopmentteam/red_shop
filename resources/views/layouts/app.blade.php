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

    @livewireStyles
</head>

<body class="min-h-screen overflow-x-hidden">
    <livewire:home.navbar />
    {{ $slot }}

    @livewireScripts
    <footer class="absolute -bottom-15 bg-linear-to-t from-brand-tertiary from-1% to-background-default to-60% w-full flex justify-center">
        <livewire:home.footer class="relative" />
    </footer>
</body>

</html>
