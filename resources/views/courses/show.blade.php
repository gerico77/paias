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
                        <tr><th>Course Name</th><td>{{ $course->courseName }}</td></tr>
                        <tr><th>Course Code</th><td>{{ $course->courseCode }}</td></tr>
                        <tr><th>Course Details</th><td>{{ $course->courseDetails }}</td></tr>
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