@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="page-title">Roles</h3>
        {!! Form::model($role, ['method' => 'PUT', 'route' => ['roles.update', $role->id]]) !!}

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-edit"></i>
                Edit
            </div>
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('title', 'Title*', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
                {!! Form::submit(trans('Update'), ['class' => 'btn btn-success btn-sm']) !!}
            </div>
        </div>

    {!! Form::close() !!}
    </div>
@stop