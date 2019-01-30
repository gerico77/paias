@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
    <h3 class="page-title">@lang('Roles')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['roles.store']]) !!}
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('Create')
        </div>
        <div class="clearfix">
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', 'Title*', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    {!! Form::submit(trans('Save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    </div>
@stop