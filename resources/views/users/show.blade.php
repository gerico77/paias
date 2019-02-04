@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
    <h3 class="page-title">@lang('Users')</h3>
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('View')
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>@lang('Username')</th>
                    <td>{{ $user->fname }}</td></tr><tr><th>@lang('First Name')</th>
                    <td>{{ $user->lname }}</td></tr><tr><th>@lang('Last Name')</th>
                    <td>{{ $user->email }}</td></tr><tr><th>@lang('User Email')</th>
                    <td>{{ $user->password }}</td></tr><tr><th>@lang('User Password')</th>
                    <td>{{ $user->role->title or '' }}</td></tr><tr><th>@lang('User Remember Token')</th>
                    <td>{{ $user->remember_token }}</td></tr>
                    </table>
                </div>
            </div>
            <p>&nbsp;</p>
            <a href="{{ route('users.index') }}" class="btn btn-default">Back to list</a>
        </div>
    </div>
    </div>
@stop