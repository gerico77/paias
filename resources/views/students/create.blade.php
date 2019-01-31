@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Create Students</h3>
            </div>
            <div class="panel-body">
            <form class="form-horizontal" action="{{ route('store') }}" method="POST">
                {{ csrf_field() }}
                <fieldset>
                    <div class="form-group">
                        <label for="firstname" class="col-md-2 control-label">First Name</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control"name="firstname"  placeholder="First Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-md-2 control-label">Last Name</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-md-2 control-label">Email</label>
                        <div class="col-md-10">
                            <input type="email" class="form-control" name="inputEmail" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-2 control-label">Password</label>
                        <div class="col-md-10">
                            <input type="inputPassword" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>

                    {{-- <div class="form-group">
                        <div class="col-md-10 col-md-offset-2">
                            <button type="button" class="btn btn-default"></button>
                            <button type="submit" class="btn btn-primary"></button>
                        </div>
                    </div> --}}
                    {!! Form::submit(trans('Save'), ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </fieldset>
            </div>
        </div>
    </div>
@endsection
