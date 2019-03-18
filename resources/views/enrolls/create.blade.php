@extends('layouts.app')

@section('content')
<div class="container-fluid">
        <h3 class="page-title">Enroll</h3>
        {!! Form::open(['method' => 'POST', 'route' => ['enrolls.store']]) !!}
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-plus"></i>
                Create
            </div>

            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('user_id', 'Users*', ['class' => 'control-label']) !!}
                    {!! Form::select('user_id', $users, old('user_id'), ['class' => 'form-control']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('user_id'))
                        <small class="form-text text-muted">
                            {{ $errors->first('user_id') }}
                        </small>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('subject_id', 'Subjects*', ['class' => 'control-label']) !!}
                    {!! Form::select('subject_id', $subjects, old('subject_id'), ['class' => 'form-control']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('subject_id'))
                        <small class="form-text text-muted">
                            {{ $errors->first('subject_id') }}
                        </small>
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
            </div>
            {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop
