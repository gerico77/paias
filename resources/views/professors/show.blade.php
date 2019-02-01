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
                    <td>{{ $professor->email }}</td></tr><tr><th>@lang('Professor Email')</th>
                    <td>{{ $professor->joining_date }}</td></tr><tr><th>@lang('Professor Joining Date')</th>
                    <td>{{ $professor->email }}</td></tr><tr><th>@lang('Professor Password')</th>
                    <td>{{ $professor->designation }}</td></tr><tr><th>@lang('Professor Designation')</th>
                    <td>{{ $professor->department }}</td></tr><tr><th>@lang('Professor Department')</th>
                    <td>{{ $professor->gender }}</td></tr><tr><th>@lang('Professor Gender')</th>
                    <td>---</td></tr><tr><th>@lang('Professor Role')</th>
                    <td>{{ $professor->role->title or '' }}</td></tr><tr><th>@lang('Professor Remember Token')</th>
                    <td>{{ $professor->remember_token }}</td></tr>
                    </table>
                </div>
            </div>
            <p>&nbsp;</p>
            <a href="{{ route('professors.index') }}" class="btn btn-default">Back to list</a>
        </div>
    </div>
    </div>
@stop