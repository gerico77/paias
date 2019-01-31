@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
    <h3 class="page-title">Questions Options</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            View
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>Question</th>
                    <td>{{ $questions_option->question->question_text or '' }}</td></tr><tr><th>Option</th>
                    <td>{{ $questions_option->option }}</td></tr><tr><th>Correct</th>
                    <td>{{ $questions_option->correct == 1 ? 'Yes' : 'No' }}</td></tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('questions_options.index') }}" class="btn btn-default">Back to list</a>
        </div>
    </div>
    </div>
@stop