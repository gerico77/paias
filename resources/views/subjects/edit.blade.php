@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="page-title">Subjects</h3>
        {!! Form::model($subject, ['method' => 'PUT', 'route' => ['subjects.update', $subject->id]]) !!}
    
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-edit"></i>
                Edit
            </div>
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('course_id', 'Course*') !!}
                    {!! Form::select('course_id', $courses, old('course_id'), ['class' => 'form-control']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('course_id'))
                        <small class="form-text text-muted">
                            {{ $errors->first('course_id') }}
                        </small>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('title', 'Title*', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('title'))
                        <small class="form-text text-muted">
                            {{ $errors->first('title') }}
                        </small>
                    @endif
                </div>
                
                {!! Form::submit('Update', ['class' => 'btn btn-danger btn-sm']) !!}
                <a href="{{ route('subjects.index') }}" class="btn btn-default btn-sm">Back to list</a>
            </div>
        </div>  
        {!! Form::close() !!}
    </div>
@endsection