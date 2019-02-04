@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="page-title">Department</h3>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-eye"></i>
                View
            </div>
            <div class="card-body">
                
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>Department Name</th><td>{{ $department->departmentName }}</td></tr>
                        <tr><th>Department Head</th><td>{{ $department->departmentHead }}</td></tr>
                        {{-- <tr><th>Department Start Date</th><td>{{ $department->departmentStartDate }}</td></tr>
                        <tr><th>Department End Date</th><td>{{ $department->departmentEndtDate }}</td></tr> --}}
                        <tr><th>Department Details</th><td>{{ $department->departmentDetails }}</td></tr>
                    </table>
                </div>
            </div>
    
                <br />
                <a href="{{ route('departments.index') }}" class="btn btn-info btn-sm">Back to list</a>
            </div>
        </div>  
    </div>
@stop