<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
</head>
<body id="page-top">

    <div id="wrapper">

        <div id="content-wrapper">
            <div class="container-fluid">
                @if (Session::has('message'))
                    <div class="alert alert-info" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
                @if ($errors->count() > 0)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
                @yield('content')
            </div>
        </div>
    </div>

    @include('partials.javascripts')
</body>
</html>