@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('departments.index') }}">Departments</a>
            </li>
            <li class="breadcrumb-item active">Add new</li>
        </ol>
    
        {!! Form::open(['method' => 'POST', 'route' => ['departments.store']]) !!}

        <div class="card mb-3">
            <div class="card-header">
                <a href="{{ route('departments.index') }}" class="btn btn-default btn-sm m-n2"><i class="fa fa-arrow-left"></i> Back to list</a>
            </div>

            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('name'))
                        <small class="form-text text-muted">
                            {{ $errors->first('name') }}
                        </small>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('user_id', 'Department Head*', ['class' => 'control-label']) !!}
                    {!! Form::select('user_id', $users, old('user_id'), ['class' => 'form-control']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('user_id'))
                        <small class="form-text text-muted">
                            {{ $errors->first('user_id') }}
                        </small>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('details', 'Details', ['class' => 'control-label']) !!}
                    {!! Form::textarea('details', old('details'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('details'))
                        <small class="form-text text-muted">
                            {{ $errors->first('details') }}
                        </small>
                    @endif
                </div>

                {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
            </div>
        </div>

        {!! Form::close() !!}
    </div>
@stop

