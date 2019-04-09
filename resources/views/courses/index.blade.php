@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Courses</li>
        </ol>

        <div class="card mb-3">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('courses.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i>
                        Add new
                    </a>
                    
                <a href="{{ route('courses.export') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-file-download"></i>
                    Export
                </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped {{ count($courses) > 0 ? 'datatable' : '' }} dt-select">
                        <thead>
                            <th style="text-align:center; width:5%"><input type="checkbox" id="select-all" /></th>
                            <th>Department</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>&nbsp;</th>
                        </thead>
                        
                        <tbody>
                            @if (count($courses) > 0)
                                @foreach ($courses as $course)
                                    <tr data-entry-id="{{ $course->id }}">
                                        <td></td>
                                        <td>{{ $course->department->name}}</td>
                                        <td>{{ $course->title}}</td>
                                        <td>{{ $course->code}}</td>
                                        <td class="text-center">
                                            <a href="{{ route('courses.show',[$course->id]) }}" class="btn btn-sm btn-success">
                                                <i class="fas fa-eye"></i>
                                                View
                                            </a>
                                            <a href="{{ route('courses.edit',[$course->id]) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </a>
                                            {!! Form::open(array(
                                                'style' => 'display: inline-block;',
                                                'method' => 'DELETE',
                                                'onsubmit' => "return confirm('Are you sure?');",
                                                'route' => ['courses.destroy', $course->id])) !!}
                                            {!! Form::button('<i class="fas fa-trash-alt"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-sm btn-danger')) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">No entries in table</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('subjects.mass_destroy') }}';
    </script>
@endsection
