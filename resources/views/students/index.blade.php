@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <h3 class="page-title">@lang('Students List')</h3>
        @if (session('successMsg'))
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert"></button>
                <strong>Well done!</strong> {{ session('successMsg') }}
            </div>
        @endif
    </div
@endsection