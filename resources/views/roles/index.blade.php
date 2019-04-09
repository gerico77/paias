@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Roles</li>
        </ol>
        <div class="card mb-3">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($roles) > 0)
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->title }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('roles.show',[$role->id]) }}" class="btn btn-sm btn-success"><i class="fas fa-eye"></i> View</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">No entries in table</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop