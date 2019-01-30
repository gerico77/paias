@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
    <h3 class="page-title">@lang('Professors')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['professors.store']]) !!}
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('Create')
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('email', 'Email*', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('joining_date', 'Joining Date', ['class' => 'control-label']) !!}
                    {!! Form::joining_date('joining_date', ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('joining_date'))
                        <p class="help-block">
                            {{ $errors->first('joining_date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('password'))
                        <p class="help-block">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>
            </div>
             <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('designation', 'Designation*', ['class' => 'control-label']) !!}
                    {!! Form::designation('designation', old('designation'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('designation'))
                        <p class="help-block">
                            {{ $errors->first('designation') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('department_id', 'Department*', ['class' => 'control-label']) !!}
                    {!! Form::department_id('department_id', old('department_id'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('department_id'))
                        <p class="help-block">
                            {{ $errors->first('department_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('gender', 'Gender*', ['class' => 'control-label']) !!}
                    {!! Form::gender('designation', old('gender'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('gender'))
                        <p class="help-block">
                            {{ $errors->first('gender') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('role_id', 'Role*', ['class' => 'control-label']) !!}
                    {!! Form::select('role_id', $roles, old('role_id'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('role_id'))
                        <p class="help-block">
                            {{ $errors->first('role_id') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {!! Form::submit(trans('Save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    </div>
@stop