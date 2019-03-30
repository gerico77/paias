@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="page-title">Questions</h3>

        {!! Form::model($question, ['method' => 'PUT', 'route' => ['questions.update', $question->id]]) !!}
    
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-edit"></i>
                Edit
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
                    {!! Form::label('answer_explanation', 'Answer explanation*') !!}
                    {!! Form::textarea('answer_explanation', old('answer_explanation'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('answer_explanation'))
                        <small class="form-text text-muted">
                            {{ $errors->first('answer_explanation') }}
                        </small>
                    @endif
                </div>
                {!! Form::submit('Update', ['class' => 'btn btn-danger']) !!}
                <a href="{{ route('questions.index') }}" class="btn btn-info">Back to list</a>
            </div>
        </div>  
        {!! Form::close() !!}
    </div>
@endsection