@extends('layouts.app') 
@section('content')
    <div class="container-fluid">
        <h3 class="page-title">Professors</h3>
        {!! Form::open(['method' => 'POST', 'route' => ['professors.store']]) !!}
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-plus"></i>
                Create
            </div>

            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('username', 'Username*', ['class' => 'control-label']) !!}
                    {!! Form::text('username', old('username'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('username'))
                        <small class="form-text text-muted">
                            {{ $errors->first('Username') }}
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
                    {!! Form::hidden('role_id', '3') !!}

                {!! Form::submit('Save', ['class' => 'btn btn-success btn-sm']) !!}
                <a href="{{ route('professors.index') }}" class="btn btn-default btn-sm">Back to list</a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop