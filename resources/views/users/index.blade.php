@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Users</li>
        </ol>
        
        <div class="card mb-3">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i>
                        Add New
                    </a>
                    {!! Form::open(array(
                        'style' => 'display: inline-block;',
                        'method' => 'POST',
                        'url' => 'import')) !!}
                        @csrf
                        {!! Form::file('import_file', array('type' => 'file')) !!}
                        {!! Form::button('<i class="fas fa-file-upload"></i> Import', array('type' => 'submit', 'class' => 'btn btn-sm btn-primary')) !!}
                        <a href="{{ route('users.export') }}" class="btn btn-primary btn-sm"><i class="fas fa-file-download"></i> Export</a>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }} dt-select">
                    <thead>
                        <tr>
                            <th style="text-align:center; width:5%"><input type="checkbox" id="select-all" /></th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($users) > 0)
                            @foreach ($users as $user)
                                <tr data-entry-id="{{ $user->id }}">
                                    <td></td>
                                    <td>{{ $user->fname }}</td>
                                    <td>{{ $user->lname }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->title }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('users.show',[$user->id]) }}" class="btn btn-sm btn-success"><i class="fas fa-eye"></i> View</a>
                                        <a href="{{ route('users.edit',[$user->id]) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a>
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('" . trans("Are you sure?") . "');",
                                            'route' => ['users.destroy', $user->id])) !!}
                                        {!! Form::button('<i class="fas fa-trash-alt"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-sm btn-danger')) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">No entries in table</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('users.mass_destroy') }}';
    </script>
@endsection