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
                    {!! Form::label('title', 'Title*', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('title'))
                        <small class="form-text text-muted">
                            {{ $errors->first('title') }}
                        </small>
                    @endif
                </div>
                
                {!! Form::submit('Update', ['class' => 'btn btn-danger']) !!}
            </div>
        </div>  
        {!! Form::close() !!}
    </div>
@endsection