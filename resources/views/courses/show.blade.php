@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="page-title">Course</h3>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-eye"></i>
                View
            </div>
            <div class="card-body">
                
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>Department</th><td>{{ $course->department->departmentName }}</td></tr>
                        <tr><th>Name</th><td>{{ $course->title }}</td></tr>
                        <tr><th>Code</th><td>{{ $course->code }}</td></tr>
                        <tr><th>Details</th><td>{{ $course->details }}</td></tr>
                        {{-- <tr><th>Start From</th><td>{{ $course->courseStartFrom }}</td></tr>
                        <tr><th>Course Time Length</th><td>{{ $course->courseTimeLength }}</td></tr>
                        <tr><th>Professor Name</th><td>{{ $course->courseProfessorName }}</td></tr> --}}
                    </table>
                </div>
            </div>
    
                <br />
                <a href="{{ route('courses.index') }}" class="btn btn-info btn-sm">Back to list</a>
            </div>
        </div>  
    </div>
@stop