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
                            <tr>
                                <th>Options</th>
                                <td>
                                    <ul>
                                    @php
                                        $i = 0;
                                        $options = array('A. ', 'B. ', 'C. ', 'D. ', 'E. ');
                                    @endphp
                                    @foreach($question->options as $option)
                                        <li style="@if ($option->correct == 1) font-weight: bold; @endif">
                                            {{ $options[$i] }}{{ $option->option }}
                                            @if ($option->correct == 1) <em>(correct answer)</em> @endif
                                        </li>
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach
                                    </ul>
                                </td>
                            </tr>
                            <tr><th>Answer Explaination</th><td>{!! $question->answer_explanation !!}</td></tr>
                        </table>
                    </div>
                </div>
                <br />
                <a href="{{ route('questions.index') }}" class="btn btn-default btn-sm">Back to list</a>
            </div>
        </div>  
    </div>
@stop