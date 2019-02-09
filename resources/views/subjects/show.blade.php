@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="page-title">Subject</h3>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-eye"></i>
                View
            </div>
            <div class="card-body">
                
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>Course</th><td>{{ $subject->course->title }}</td></tr>
                        <tr><th>Title</th><td>{{ $subject->title }}</td></tr>
                    </table>
                </div>
            </div>
    
            <br />
            <a href="{{ route('subjects.index') }}" class="btn btn-info btn-sm">Back to list</a>
            </div>
        </div>  
    </div>
@stop