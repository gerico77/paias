@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
    <h3 class="page-title">@lang('User Actions')</h3>
    <p></p>
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('List')
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($user_actions) > 0 ? 'datatable' : '' }} ">
                <thead>
                    <tr>
                        <th>@lang('User')</th>
                        <th>@lang('Action')</th>
                        <th>@lang('Action model')</th>
                        <th>@lang('Action id')</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($user_actions) > 0)
                        @foreach ($user_actions as $user_action)
                            <tr data-entry-id="{{ $user_action->id }}">
                                <td>{{ $user_action->user->name or '' }}</td>
                                <td>{{ $user_action->action }}</td>
                                <td>{{ $user_action->action_model }}</td>
                                <td>{{ $user_action->action_id }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">@lang('No entries in table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    </div>
@stop