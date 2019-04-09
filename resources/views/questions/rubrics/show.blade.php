@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="page-title">Questions</h3>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-eye"></i>
                View
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered table-striped">
                            <tr><th>Subject</th><td>{{ $question->subject->title }}</td></tr>
                            <tr><th>Question Text</th><td>{!! $question->question_text !!}</td></tr>
                            <tr><th>Correct Answer</th><td>{{ $question->options->first()->option }}</td>
                            </tr>
                            <tr><th>Answer Explanation</th><td>{!! $question->answer_explanation !!}</td></tr>
                        </table>
                    </div>
                </div>
                <br />
                <a href="{{ route('questions.index') }}" class="btn btn-default btn-sm">Back to list</a>
            </div>
        </div>  
    </div>
@stop