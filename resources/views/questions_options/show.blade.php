@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3 class="page-title">Questions Options</h3>
    
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-eye"></i>
            View
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>Question</th>
                    <td>{{ $questions_option->question->question_text }}</td></tr><tr><th>Option</th>
                    <td>{{ $questions_option->option }}</td></tr><tr><th>Correct</th>
                    <td>{{ $questions_option->correct == 1 ? 'Yes' : 'No' }}</td></tr>
                    </table>
                </div>
            </div>
            <br />  
            <a href="{{ route('questions_options.index') }}" class="btn btn-default btn-sm">Back to list</a>
        </div>
    </div>
    </div>
@stop