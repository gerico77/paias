@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="page-title">Departments</h3>

        {!! Form::model($department, ['method' => 'PUT', 'route' => ['departments.update', $department->id]]) !!}
    
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-edit"></i>
                Edit
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
                        <p class="help-block"></p>
                        @if($errors->has('user_id'))
                            <p class="help-block">
                                {{ $errors->first('user_id') }}
                            </p>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('details', 'Details', ['class' => 'control-label']) !!}
                        {!! Form::text('details', old('details'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                        <small class="form-text text-muted"></small>
                        @if($errors->has('details'))
                            <small class="form-text text-muted">
                                {{ $errors->first('details') }}
                            </small>
                        @endif
                    </div>
                
                {!! Form::submit('Update', ['class' => 'btn btn-danger btn-sm']) !!}
                <a href="{{ route('departments.index') }}" class="btn btn-default btn-sm">Back to list</a>
            </div>
        </div>  
        {!! Form::close() !!}
    </div>
@endsection