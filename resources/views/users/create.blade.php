@extends('layouts.app') 
@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('users.index') }}">Users</a>
            </li>
            <li class="breadcrumb-item active">Add new</li>
        </ol>

        {!! Form::open(['method' => 'POST', 'route' => ['users.store']]) !!}
        <div class="card mb-3">
            <div class="card-header">
                <a href="{{ route('users.index') }}" class="btn btn-default btn-sm m-n2"><i class="fa fa-arrow-left"></i> Back to list</a>
            </div>
            
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('username', 'Username*', ['class' => 'control-label']) !!}
                    {!! Form::text('username', old('username'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('username'))
                        <small class="form-text text-muted">
                            {{ $errors->first('username') }}
                        </small>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('fname', 'First Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('fname', old('fname'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('fname'))
                        <small class="form-text text-muted">
                            {{ $errors->first('fname') }}
                        </small>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('lname', 'Last Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('lname', old('lname'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('lname'))
                        <small class="form-text text-muted">
                            {{ $errors->first('lname') }}
                        </small>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email*', ['class' => 'control-label']) !!} 
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('email'))
                        <small class="form-text text-muted">
                            {{ $errors->first('email') }}
                        </small>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Password*', ['class' => 'control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('password'))
                        <small class="form-text text-muted">
                            {{ $errors->first('password') }}
                        </small>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('role_id', 'Role*', ['class' => 'control-label']) !!}
                    {!! Form::select('role_id', $roles, old('role_id'), ['class' => 'form-control']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('role_id'))
                        <small class="form-text text-muted">
                            {{ $errors->first('role_id') }}
                        </small>
                    @endif
                </div>
                {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop