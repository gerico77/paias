@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="page-title">Course</h3>

        {!! Form::model($course, ['method' => 'PUT', 'route' => ['courses.update', $course->id]]) !!}
    
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-edit"></i>
                Edit
            </div>
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('department_id', 'Department*') !!}
                    {!! Form::select('department_id', $departments, old('department_id'), ['class' => 'form-control']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('department_id'))
                        <small class="form-text text-muted">
                            {{ $errors->first('department_id')}}
                        </small>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('title', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('title'))
                        <small class="form-text text-muted">
                            {{ $errors->first('title') }}
                        </small>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('code', 'Code*', ['class' => 'control-label']) !!}
                    {!! Form::text('code', old('code'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('code'))
                        <small class="form-text text-muted">
                            {{ $errors->first('code') }}
                        </small>
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
                <a href="{{ route('courses.index') }}" class="btn btn-default btn-sm">Back to list</a>
            </div>
        </div>  
        {!! Form::close() !!}
    </div>
@endsection