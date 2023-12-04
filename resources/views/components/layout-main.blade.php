<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon" />
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/logo.png') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? config('app.name') }}</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="d-flex flex-column min-vh-100">
        <header class="sticky-top">
            <x-navbar />
        </header>

        <main class="mt-5">
            {{ $slot }}
        </main>

        <footer>
            <x-footer />
        </footer>
    </div>
</body>

</html>