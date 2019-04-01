@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('results.index') }}">Results</a>
            </li>
            <li class="breadcrumb-item active">View</li>
        </ol>

        <div class="card mb-3">
            <div class="card-header">
                <h4>
                    {{ $test->exam->subject->title . ' - ' . $test->exam->title }}
                </h4>
            </div>
            <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        {{-- @if(Auth::user()->isAdmin())
                        <tr>
                            <th>User</th>
                            <td>{{ $test->user->fname }} {{ $test->user->lname }} ({{ $test->user->email }})</td>
                        </tr>
                        @endif --}}
                        <tr>
                            <th>Date</th>
                            <td>{{ $test->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Result</th>
                            <td>{{ $test->result }}/{{ count($test->exam->exam_questions) }}</td>
                        </tr>
                    </table>
                    <?php $i = 1 ?>
                    @foreach($results as $result)
                        <table class="table table-bordered table-striped">
                            <tr class="test-option{{ $result->correct ? '-true' : '-false' }}">
                                <th style="width: 10%">Question #{{ $i }}</th>
                                <th>{{ $result->question->question_text }}</th>
                            </tr>
                            <tr>
                                <td>Options</td>
                                <td>
                                    <ul>
                                    @foreach($result->question->options as $option)
                                        <li style="@if ($option->correct == 1) font-weight: bold; @endif
                                            @if ($result->option_id == $option->id) text-decoration: underline @endif">{{ $option->option }}
                                            @if ($option->correct == 1) <em>(correct answer)</em> @endif
                                            @if ($result->option_id == $option->id) <em>(your answer)</em> @endif
                                        </li>
                                    @endforeach
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>Answer Explanation</td>
                                <td>
                                {!! $result->question->answer_explanation  !!}
                                    @if ($result->question->more_info_link != '')
                                        <br>
                                        <br>
                                        Read more:
                                        <a href="{{ $result->question->more_info_link }}" target="_blank">{{ $result->question->more_info_link }}</a>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    <?php $i++ ?>
                    @endforeach
                </div>
            </div>

            <br />
            {{-- <a href="{{ route('tests.index', $test->user_id) }}" class="btn btn-info btn-sm">Take another quiz</a> --}}
            <a href="{{ route('results.index') }}" class="btn btn-info btn-sm">See all my results</a>
            </div>
        </div>
    </div>
@stop
