@extends('layouts.app')

@section('content')
    <h3 class="page-title">Questions</h3>
    
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-eye"></i>
            View
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tr><th>Subject</th><td>{{ $question->subject->title or '' }}</td></tr>
                <tr><th>Question Text</th><td>{!! $question->question_text !!}</td></tr>
                <tr><th>Answer Explaination</th><td>{!! $question->answer_explanation !!}</td></tr>
            </table>

            <br />
            <a href="{{ route('questions.index') }}" class="btn btn-info btn-sm">Back to list</a>
        </div>
    </div>  
@endsection