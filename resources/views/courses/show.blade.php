@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('courses.index') }}">Courses</a>
            </li>
            <li class="breadcrumb-item active">View</li>
        </ol>

        <div class="card mb-3">
            <div class="card-header">
                <a href="{{ route('courses.index') }}" class="btn btn-default btn-sm m-n2"><i class="fa fa-arrow-left"></i> Back to list</a>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered table-striped">
                            <tr><th>Department</th><td>{{ $course->department->name }}</td></tr>
                            <tr><th>Name</th><td>{{ $course->title }}</td></tr>
                            <tr><th>Code</th><td>{{ $course->code }}</td></tr>
                            <tr><th>Details</th><td>{{ $course->details }}</td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>  
    </div>
@stop