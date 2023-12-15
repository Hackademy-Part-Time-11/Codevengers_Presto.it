<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon" />
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/logo.png') }}">
    <title>{{ $title ?? config('app.name')}}</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])


</head>

<body>
    <div class="d-flex flex-column min-vh-100">
        <header class="sticky-top">
            <x-navbar />
        </header>

        <main class="container-fluid mt-5">
            {{ $slot }}
        </main>

        <footer>
            <x-footer />
        </footer>
    </div>
</body>
</html>