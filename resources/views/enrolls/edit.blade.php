@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="page-title">@lang('Enrolls')</h3>
        {!! Form::model($enroll, ['method' => 'PUT', 'route' => ['enrolls.update', $enroll->id]]) !!}
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-edit"></i>
                Edit
            </div>
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('user_id', 'Users*', ['class' => 'control-label']) !!}
                    {!! Form::select('user_id', $users, old('user_id'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('user_id'))
                        <p class="help-block">
                            {{ $errors->first('user_id') }}
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('subject_id', 'Subjects*', ['class' => 'control-label']) !!}
                    {!! Form::select('subject_id', $subjects, old('subject_id'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('subject_id'))
                        <p class="help-block">
                            {{ $errors->first('subject_id') }}
                        </p>
                    @endif
                </div>

                {!! Form::submit('Update', ['class' => 'btn btn-success btn-sm']) !!}
                <a href="{{ route('enrolls.index') }}" class="btn btn-default btn-sm">Back to list</a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop