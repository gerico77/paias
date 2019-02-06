@extends('layouts.app')

@section('content')
    <div class="container-fluid">
    <h3 class="page-title">Questions</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['questions.store']]) !!}

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-plus"></i>
            Create
        </div>

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
                {!! Form::label('question_text', 'Question text*') !!}
                {!! Form::textarea('question_text', old('question_text'), ['class' => 'form-control', 'placeholder' => '']) !!}
                <small class="form-text text-muted"></small>
                @if($errors->has('question_text'))
                    <small class="form-text text-muted">
                        {{ $errors->first('question_text') }}
                    </small>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('option1', 'Option #1', ['class' => 'control-label']) !!}
                {!! Form::text('option1', old('option1'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                <small class="form-text text-muted"></small>
                @if($errors->has('option1'))
                    <small class="form-text text-muted">
                        {{ $errors->first('option1') }}
                    </small>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('option2', 'Option #2', ['class' => 'control-label']) !!}
                {!! Form::text('option2', old('option2'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                <small class="form-text text-muted"></small>
                @if($errors->has('option2'))
                    <small class="form-text text-muted">
                        {{ $errors->first('option2') }}
                    </small>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('option3', 'Option #3', ['class' => 'control-label']) !!}
                {!! Form::text('option3', old('option3'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                <small class="form-text text-muted"></small>
                @if($errors->has('option3'))
                    <small class="form-text text-muted">
                        {{ $errors->first('option3') }}
                    </small>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('option4', 'Option #4', ['class' => 'control-label']) !!}
                {!! Form::text('option4', old('option4'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                <small class="form-text text-muted"></small>
                @if($errors->has('option4'))
                    <small class="form-text text-muted">
                        {{ $errors->first('option4') }}
                    </small>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('option5', 'Option #5', ['class' => 'control-label']) !!}
                {!! Form::text('option5', old('option5'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                <small class="form-text text-muted"></small>
                @if($errors->has('option5'))
                    <small class="form-text text-muted">
                        {{ $errors->first('option5') }}
                    </small>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('correct', 'Correct', ['class' => 'control-label']) !!}
                {!! Form::select('correct', $correct_options, old('correct'), ['class' => 'form-control']) !!}
                <small class="form-text text-muted"></small>
                @if($errors->has('correct'))
                    <small class="form-text text-muted">
                        {{ $errors->first('correct') }}
                    </small>
                    @endif
            </div>
            <div class="form-group">
                {!! Form::label('code_snippet', 'Code snippet', ['class' => 'control-label']) !!}
                {!! Form::textarea('code_snippet', old('code_snippet'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                <small class="form-text text-muted"></small>
                @if($errors->has('code_snippet'))
                    <small class="form-text text-muted">
                        {{ $errors->first('code_snippet') }}
                    </small>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('answer_explanation', 'Answer explanation*', ['class' => 'control-label']) !!}
                {!! Form::textarea('answer_explanation', old('answer_explanation'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                <small class="form-text text-muted"></small>
                @if($errors->has('answer_explanation'))
                    <small class="form-text text-muted">
                        {{ $errors->first('answer_explanation') }}
                    </small>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('more_info_link', 'More info link', ['class' => 'control-label']) !!}
                {!! Form::text('more_info_link', old('more_info_link'), ['class' => 'form-control', 'placeholder' => '']) !!}
                <small class="form-text text-muted"></small>
                @if($errors->has('more_info_link'))
                    <small class="form-text text-muted">
                        {{ $errors->first('more_info_link') }}
                    </small>
                @endif
            </div>

            {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
        </div>
    </div>
    {!! Form::close() !!}
    </div>
@stop

