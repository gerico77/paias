@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('users.index') }}">Users</a>
            </li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
        
        {!! Form::model($user, ['method' => 'PUT', 'route' => ['users.update', $user->id]]) !!}
        <div class="card mb-3">
            <div class="card-header">
                <a href="{{ route('users.index') }}" class="btn btn-default btn-sm m-n2"><i class="fa fa-arrow-left"></i> Back to list</a>
            </div>
            
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('username', 'Username*', ['class' => 'control-label']) !!}
                    {!! Form::text('username', old('username'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('username'))
                        <p class="help-block">
                            {{ $errors->first('username') }}
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('fname', 'First Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('fname', old('fname'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('fname'))
                        <p class="help-block">
                            {{ $errors->first('fname') }}
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('lname', 'Last Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('lname', old('lname'), ['class' => 'form-control', 'place    holder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('lname'))
                        <p class="help-block">
                            {{ $errors->first('lname') }}
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email*', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('password'))
                        <p class="help-block">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('role_id', 'Role*', ['class' => 'control-label']) !!}
                    {!! Form::select('role_id', $roles, old('role_id'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('role_id'))
                        <p class="help-block">
                            {{ $errors->first('role_id') }}
                        </p>
                    @endif
                </div>

                {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop