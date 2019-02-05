@extends('layouts.app') 
@section('content')
    <div class="container-fluid">
        <h3 class="page-title">Users</h3>
        {!! Form::open(['method' => 'POST', 'route' => ['users.store']]) !!}
<<<<<<< HEAD
        
=======

>>>>>>> e6f8b52a137632657c9ec77d9b24c846f9a0c5a5
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-plus"></i>
                Create
            </div>

            <div class="card-body">
                <div class="form-group">
<<<<<<< HEAD
                    {!! Form::label('username', 'Username*', ['class' => 'control-label']) !!}
=======
                    {!! Form::label('username', 'Username*', ['class' => 'control-label']) !!} 
>>>>>>> e6f8b52a137632657c9ec77d9b24c846f9a0c5a5
                    {!! Form::text('username', old('username'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('username'))
                        <small class="form-text text-muted">
                            {{ $errors->first('Username') }}
                        </small>
                    @endif
                </div>
                <div class="form-group">
<<<<<<< HEAD
                    {!! Form::label('fname', 'First Name*', ['class' => 'control-label']) !!}
=======
                    {!! Form::label('fname', 'First Name*', ['class' => 'control-label']) !!} 
>>>>>>> e6f8b52a137632657c9ec77d9b24c846f9a0c5a5
                    {!! Form::text('fname', old('fname'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('fname'))
                        <small class="form-text text-muted">
                            {{ $errors->first('fname') }}
                        </small>
                    @endif
                </div>
                <div class="form-group">
<<<<<<< HEAD
                    {!! Form::label('lname', 'Last Name*', ['class' => 'control-label']) !!}
=======
                    {!! Form::label('lname', 'Last Name*', ['class' => 'control-label']) !!} 
>>>>>>> e6f8b52a137632657c9ec77d9b24c846f9a0c5a5
                    {!! Form::text('lname', old('lname'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('lname'))
                        <small class="form-text text-muted">
                            {{ $errors->first('lname') }}
                        </small>
                    @endif
                </div>
                <div class="form-group">
<<<<<<< HEAD
                    {!! Form::label('email', 'Email*', ['class' => 'control-label']) !!}
=======
                    {!! Form::label('email', 'Email*', ['class' => 'control-label']) !!} 
>>>>>>> e6f8b52a137632657c9ec77d9b24c846f9a0c5a5
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('email'))
                        <small class="form-text text-muted">
                            {{ $errors->first('email') }}
                        </small>
                    @endif
                </div>
                <div class="form-group">
<<<<<<< HEAD
                    {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
=======
                    {!! Form::label('password', 'Password*', ['class' => 'control-label']) !!} 
>>>>>>> e6f8b52a137632657c9ec77d9b24c846f9a0c5a5
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('password'))
                        <small class="form-text text-muted">
                            {{ $errors->first('password') }}
                        </small>
                    @endif
                </div>

<<<<<<< HEAD
                {!! Form::submit(trans('Save'), ['class' => 'btn btn-success']) !!}
            </div>
        </div>
    {!! Form::close() !!}
=======
                {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
        {!! Form::close() !!}
>>>>>>> e6f8b52a137632657c9ec77d9b24c846f9a0c5a5
    </div>
@stop