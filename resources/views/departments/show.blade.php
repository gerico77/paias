@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('departments.index') }}">Departments</a>
            </li>
            <li class="breadcrumb-item active">View</li>
        </ol>

        <div class="card mb-3">
            <div class="card-header">
                <a href="{{ route('departments.index') }}" class="btn btn-default btn-sm m-n2"><i class="fa fa-arrow-left"></i> Back to list</a>
            </div>
            
            <div class="card-body">
                
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered table-striped">
                            <tr><th>Name</th><td>{{ $department->name }}</td></tr>
                            <tr><th>Dept. Head</th><td>{{ $department->user->fname . ' ' . $department->user->lname }}</td></tr>
                            <tr><th>Details</th><td>{{ $department->details }}</td></tr>
                        </table>
                    </div>
                </div>       
            </div>
        </div>  
    </div>
@stop