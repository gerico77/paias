@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">User actions</li>
        </ol>
        
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                List
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped {{ count($user_actions) > 0 ? 'datatable' : '' }} ">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Action</th>
                                <th>Action model</th>
                                <th>Action id</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if (count($user_actions) > 0)
                            @foreach ($user_actions as $user_action)
                                <tr data-entry-id="{{ $user_action->id }}">
                                    <td>{{ $user_action->user->fname }} {{ $user_action->user->lname }}</td>
                                    <td>{{ $user_action->action }}</td>
                                    <td>{{ $user_action->action_model }}</td>
                                    <td>{{ $user_action->action_id }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4">No entries in table</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop