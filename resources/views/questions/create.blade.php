@extends('layouts.app')

@section('content')
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
                {!! Form::label('option1', 'Option #1') !!}
                {!! Form::text('option1', old('option1'), ['class' => 'form-control', 'placeholder' => '']) !!}
                <small class="form-text text-muted"></small>
                @if($errors->has('option1'))
                    <small class="form-text text-muted">
                        {{ $errors->first('option1') }}
                    </small>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('option2', 'Option #2') !!}
                {!! Form::text('option2', old('option2'), ['class' => 'form-control', 'placeholder' => '']) !!}
                <small class="form-text text-muted"></small>
                @if($errors->has('option2'))
                    <small class="form-text text-muted">
                        {{ $errors->first('option2') }}
                    </small>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('option3', 'Option #3') !!}
                {!! Form::text('option3', old('option3'), ['class' => 'form-control', 'placeholder' => '']) !!}
                <small class="form-text text-muted"></small>
                @if($errors->has('option3'))
                    <small class="form-text text-muted">
                        {{ $errors->first('option3') }}
                    </small>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('option4', 'Option #4') !!}
                {!! Form::text('option4', old('option4'), ['class' => 'form-control', 'placeholder' => '']) !!}
                <small class="form-text text-muted"></small>
                @if($errors->has('option4'))
                    <small class="form-text text-muted">
                        {{ $errors->first('option4') }}
                    </small>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('option5', 'Option #5') !!}
                {!! Form::text('option5', old('option5'), ['class' => 'form-control', 'placeholder' => '']) !!}
                <small class="form-text text-muted"></small>
                @if($errors->has('option5'))
                    <small class="form-text text-muted">
                        {{ $errors->first('option5') }}
                    </small>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('correct', 'Correct') !!}
                {!! Form::select('correct', $correct_options, old('correct'), ['class' => 'form-control']) !!}
                <small class="form-text text-muted"></small>
                @if($errors->has('correct'))
                    <small class="form-text text-muted">
                        {{ $errors->first('correct') }}
                    </small>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('answer_explanation', 'Answer explanation*') !!}
                {!! Form::textarea('answer_explanation', old('answer_explanation'), ['class' => 'form-control', 'placeholder' => '']) !!}
                <small class="form-text text-muted"></small>
                @if($errors->has('answer_explanation'))
                    <small class="form-text text-muted">
                        {{ $errors->first('answer_explanation') }}
                    </small>
                @endif
            </div>
            {!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
        </div>
    </div>
    
    {!! Form::close() !!}
@endsection