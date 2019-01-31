@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
    <h3 class="page-title">@lang('Roles')</h3>
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('View')
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>@lang('Role')</th>
                    <td>{{ $role->title }}</td></tr>
                    </table>
                </div>
            </div>
            <p>&nbsp;</p>
            <a href="{{ route('roles.index') }}" class="btn btn-default">@lang('Back to list')</a>
        </div>
    </div>
    </div>
@stop