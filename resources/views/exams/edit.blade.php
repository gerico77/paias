@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('exams.index') }}">Exams</a>
            </li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>

        {!! Form::model($exam, ['method' => 'PUT', 'route' => ['exams.update', $exam->id]]) !!}
        {!! Form::hidden('user_id', Auth::id()) !!}
    
        <div class="card mb-3">
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('subject_id', 'Subject*') !!}
                    {!! Form::select('subject_id', $subjects, old('subject_id'), ['class' => 'form-control']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('subject_id'))
                        <small class="form-text text-muted">
                            {{ $errors->first('subject_id') }}
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

                <div class="form-group">
                    {!! Form::label('category_id', 'Category*') !!}
                    {!! Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('category_id'))
                        <small class="form-text text-muted">
                            {{ $errors->first('category_id') }}
                        </small>
                    @endif
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('start_date', 'Start Date*') !!}
                            {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
                            <small class="form-text text-muted"></small>
                            @if($errors->has('start_date'))
                                <small class="form-text text-muted">
                                    {{ $errors->first('start_date') }}
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('start_time', 'Start Time*') !!}
                            {!! Form::time('start_time', null, ['class' => 'form-control']) !!}
                            <small class="form-text text-muted"></small>
                            @if($errors->has('start_time'))
                                <small class="form-text text-muted">
                                    {{ $errors->first('start_time') }}
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('time_limit', 'Time Limit (minutes)*') !!}
                            {!! Form::number('time_limit', null, ['class' => 'form-control', 'min' => '1']) !!}
                            <small class="form-text text-muted"></small>
                            @if($errors->has('time_limit'))
                                <small class="form-text text-muted">
                                    {{ $errors->first('time_limit') }}
                                </small>
                            @endif
                        </div>
                    </div>
                </div>
                
                {!! Form::submit('Update', ['class' => 'btn btn-danger btn-sm']) !!}
            </div>
        </div>  
        {!! Form::close() !!}
    </div>
@endsection