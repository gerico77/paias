@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="page-title">Subjects</h3>
        {!! Form::open(['method' => 'POST', 'route' => ['subjects.store']]) !!}

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-plus"></i>
                Create
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

                {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                <a href="{{ route('subjects.index') }}" class="btn btn-info">Back to list</a>
            </div>
        </div>

        {!! Form::close() !!}
    </div>
@stop

