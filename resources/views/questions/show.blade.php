@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
    <h3 class="page-title">Questions</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            View
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                <tr><th>Subject</th><td>{{ $question->subject->title or '' }}</td></tr>
                <tr><th>Question Text</th><td>{!! $question->question_text !!}</td></tr>
                <tr><th>Code Snippet</th><td>{!! $question->code_snippet !!}</td></tr>
                <tr><th>Answer Explaination</th><td>{!! $question->answer_explanation !!}</td></tr>
                <tr><th>More info link</th><td>{!! $question->more_info_link !!}</td></tr>
            </table>

           <p>&nbsp;</p>

            <a href="{{ route('questions.index') }}" class="btn btn-default">Back to list.</a>
        </div>
    </div>
    </div>
@stop