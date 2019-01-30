@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
    <h3 class="page-title">@lang('Professors')</h3>
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('View')
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>@lang('Professor Name')</th>
                    <td>{{ $professor->name }}</td></tr><tr><th>@lang('Professor Email')</th>
                    <td>{{ $professor->name }}</td></tr><tr><th>@lang('Professor Joining Date')</th>
                    <td>{{ $professor->email }}</td></tr><tr><th>@lang('Professor Password')</th>
                    <td>{{ $professor->name }}</td></tr><tr><th>@lang('Professor Designation')</th>
                    <td>{{ $professor->name }}</td></tr><tr><th>@lang('Professor Department')</th>
                    <td>{{ $professor->name }}</td></tr><tr><th>@lang('Professor Gender')</th>
                    <td>---</td></tr><tr><th>@lang('Users Role')</th>
                    <td>{{ $user->role->title or '' }}</td></tr><tr><th>@lang('User Remember Token')</th>
                    <td>{{ $user->remember_token }}</td></tr>
                    </table>
                </div>
            </div>
            <p>&nbsp;</p>
            <a href="{{ route('professors.index') }}" class="btn btn-default">@lang('Back to list')</a>
        </div>
    </div>
    </div>
@stop