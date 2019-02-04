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
                {!! Form::label('departmentName', 'Department Name*', ['class' => 'control-label']) !!}
                {!! Form::text('departmentName', old('departmentName'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                <small class="form-text text-muted"></small>
                @if($errors->has('departmentName'))
                    <small class="form-text text-muted">
                        {{ $errors->first('departmentName') }}
                    </small>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('departmentHead', 'Department Head*', ['class' => 'control-label']) !!}
                {!! Form::text('departmentHead', old('departmentHead'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                <small class="form-text text-muted"></small>
                @if($errors->has('departmentHead'))
                    <small class="form-text text-muted">
                        {{ $errors->first('departmentHead') }}
                    </small>
                @endif
            </div>
            {{-- <div class="form-group">
                {!! Form::label('departmentStartDate', 'Department Start Date*', ['class' => 'control-label']) !!}
                {!! Form::timestamps('departmentStartDate', old('departmentStartDate'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                <small class="form-timestamps timestamps-muted"></small>
                @if($errors->has('departmentStartDate'))
                    <small class="form-timestamps timestamps-muted">
                        {{ $errors->first('departmentStartDate') }}
                    </small>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('departmentEndtDate', 'Department End Date*', ['class' => 'control-label']) !!}
                {!! Form::timestamps('departmentEndtDate', old('departmentEndtDate'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                <small class="form-timestamps timestamps-muted"></small>
                @if($errors->has('departmentEndtDate'))
                    <small class="form-timestamps timestamps-muted">
                        {{ $errors->first('departmentEndtDate') }}
                    </small>
                @endif
            </div> --}}
            <div class="form-group">
                {!! Form::label('departmentDetails', 'Department Details*', ['class' => 'control-label']) !!}
                {!! Form::text('departmentDetails', old('departmentDetails'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                <small class="form-text text-muted"></small>
                @if($errors->has('departmentDetails'))
                    <small class="form-text text-muted">
                        {{ $errors->first('departmentDetails') }}
                    </small>
                @endif
            </div>

            {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
        </div>
    </div>

    {!! Form::close() !!}
    </div>
@stop

