<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
</head>
<body class="bg-dark">
    <div class="container">
        @yield('content')
    </div>

    @include('partials.javascripts')
</body>
</html>