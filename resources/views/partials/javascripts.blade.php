<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

<script>
    window._token = '{{ csrf_token() }}';
</script>

@yield('javascript')