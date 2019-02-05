@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="page-title">Courses</h3>

        {!! Form::model($course, ['method' => 'PUT', 'route' => ['courses.update', $course->id]]) !!}
    
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-edit"></i>
                Edit
            </div>
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('courseName', 'Course Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('courseName', old('courseName'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('courseName'))
                        <small class="form-text text-muted">
                            {{ $errors->first('courseName') }}
                        </small>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('courseCode', 'Course Code*', ['class' => 'control-label']) !!}
                    {!! Form::text('courseCode', old('courseCode'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('courseCode'))
                        <small class="form-text text-muted">
                            {{ $errors->first('courseCode') }}
                        </small>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('courseDetails', 'Course Details*', ['class' => 'control-label']) !!}
                    {!! Form::text('courseDetails', old('courseDetails'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('courseDetails'))
                        <small class="form-text text-muted">
                            {{ $errors->first('courseDetails') }}
                        </small>
                    @endif
                </div>
                
                {!! Form::submit('Update', ['class' => 'btn btn-danger']) !!}
            </div>
        </div>  
        {!! Form::close() !!}
    </div>
@endsection