@extends('layouts.app')

@section('content')
    <div class="container-fluid">
    <h3 class="page-title">Departments</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['departments.store']]) !!}

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-plus"></i>
            Create
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
                {!! Form::label('head', 'Department Head*', ['class' => 'control-label']) !!}
                {!! Form::text('head', old('head'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                <small class="form-text text-muted"></small>
                @if($errors->has('head'))
                    <small class="form-text text-muted">
                        {{ $errors->first('head') }}
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

            {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
        </div>
    </div>

    {!! Form::close() !!}
    </div>
@stop

