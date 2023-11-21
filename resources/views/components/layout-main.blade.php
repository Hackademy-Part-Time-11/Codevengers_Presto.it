<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="d-flex flex-column min-vh-100">
        <header class="sticky-top">
            <x-navbar />
        </header>

        <main class="container mt-5">
            {{ $slot }}
        </main>

        <footer class="mt-auto">
            <x-footer />
        </footer>
    </div>
</body>
</html>