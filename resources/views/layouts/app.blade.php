<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
</head>
<body id="page-top">
    @include('partials.navbar')

    <div id="wrapper">
        @include('partials.sidebar')

        <div id="content-wrapper">
            @yield('content')
        </div>
        
        @include('partials.footer')
    </div>
</body>
</html>