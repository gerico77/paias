@extends('layouts.app') 

@section('content')
    <div class="container-fluid">
        <h3 class="page-title">Users</h3>
<<<<<<< HEAD
        
=======

>>>>>>> e6f8b52a137632657c9ec77d9b24c846f9a0c5a5
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-eye"></i>
                View
            </div>
<<<<<<< HEAD
            <div class="card-body">
                    
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>Username</th>
                        <td>{{ $user->fname }}</td></tr><tr><th>@lang('First Name')</th>
                        <td>{{ $user->lname }}</td></tr><tr><th>@lang('Last Name')</th>
                        <td>{{ $user->email }}</td></tr><tr><th>@lang('User Email')</th>
                        <td>{{ $user->password }}</td></tr><tr><th>@lang('User Password')</th>
                        <td>{{ $user->role->title or '' }}</td></tr><tr><th>@lang('User Remember Token')</th>
                        <td>{{ $user->remember_token }}</td></tr>
                    </table>
=======

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
                        </table>
                    </div>
>>>>>>> e6f8b52a137632657c9ec77d9b24c846f9a0c5a5
                </div>

                <br />
                <a href="{{ route('users.index') }}" class="btn btn-info btn-sm">Back to list</a>
            </div>
<<<<<<< HEAD

                <br />
                <a href="{{ route('users.index') }}" class="btn btn-info btn-sm">Back to list</a>
            </div>
=======
>>>>>>> e6f8b52a137632657c9ec77d9b24c846f9a0c5a5
        </div>
    </div>
@stop