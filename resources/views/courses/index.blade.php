@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="page-title">Courses</h3>
    
        <p>
            <a href="{{ route('courses.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Add new
            </a>
        </p>
    
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                List
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped {{ count($courses) > 0 ? 'datatable' : '' }} dt-select">
                        <thead>
                            <th style="text-align:center; width:5%"><input type="checkbox" id="select-all" /></th>
                            <th>Department</th>
                            <th>Name</th>
                            <th>Code</th>
                            {{-- <th>Start From</th>
                            <th>Course Time Length</th>
                            <th>Professor Name</th> --}}
                            <th style="width:20%">&nbsp;</th>
                        </thead>
                        
                        <tbody>
                            @if (count($courses) > 0)
                                @foreach ($courses as $course)
                                    <tr data-entry-id="{{ $course->id }}">
                                        <td></td>
                                        <td>{{ $course->department->departmentName}}</td>
                                        <td>{{ $course->title}}</td>
                                        <td>{{ $course->code}}</td>
                                        {{-- <td>{{ $course->courseStartFrom}}</td>
                                        <td>{{ $course->courseTimeLength}}</td>
                                        <td>{{ $course->courseProfessorName}}</td> --}}
                                        <td>
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
