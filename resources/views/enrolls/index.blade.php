@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="page-title">Enrolls</h3>
            <p>
                <a href="{{ route('enrolls.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    Add New
                </a>
            </p>
        
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                List
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped {{ count($enrolls) > 0 ? 'datatable' : '' }} dt-select">
                    <thead>
                        <tr>
                            <th style="text-align:center; width:5%"><input type="checkbox" id="select-all" /></th>
                            <th>Users</th>
                            <th>Subjects</th>
                            <th>Roles</th>
                            <th style="width:20%">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($enrolls) > 0)
                            @foreach ($enrolls as $enroll)
                                <tr data-entry-id="{{ $enroll->id }}">
                                    <td></td>
                                    <td>{{ $enroll->user->fname . ' ' . $enroll->user->lname }}</td>
                                    <td>{{ $enroll->subject->title }}</td>
                                    <td>{{ $enroll->user->role->title }}</td>
                                    <td>
                                        <a href="{{ route('enrolls.show',[$enroll->id]) }}" class="btn btn-sm btn-success"><i class="fas fa-eye"></i> View</a>
                                        <a href="{{ route('enrolls.edit',[$enroll->id]) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a>
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                                            'route' => ['enrolls.destroy', $enroll->id])) !!}
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
        window.route_mass_crud_entries_destroy = '{{ route('enrolls.mass_destroy') }}';
    </script>
@endsection