{{-- resources/views/layouts/auth/auth-layout.blade.php --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    <div id="app">
        @yield('content')
    </div>
</body>

</html>