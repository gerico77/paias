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
        @include('partials.footer')
    </div>
    <div class="scroll-to-top" style="display: none;">
        <i class="fa fa-arrow-up"></i>
    </div>
    @include('partials.javascripts')
</body>
</html>