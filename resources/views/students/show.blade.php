@extends('layouts.app') 

@section('content')
    <div class="container-fluid">
        <h3 class="page-title">Students</h3>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-eye"></i>
                View
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Username</th>
                                <td>{{ $user->username }}</td>
                            </tr>
                            <tr>
                                <th>First Name</th>
                                <td>{{ $user->fname }}</td>
                            </tr>
                            <tr>
                                <th>Last Name</th>
                                <td>{{ $user->lname }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>User Remember Token</th>
                                <td>{{ $user->remember_token }}</td>
                            </tr>
                            <tr>
                                <th>Role</th>
                                <td>{{ $user->role->title}}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <br />
                <a href="{{ route('students.index') }}" class="btn btn-default btn-sm">Back to list</a>
            </div>
        </div>
    </div>
@stop