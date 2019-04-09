@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Results</li>
        </ol>

        <div class="card mb-3">
            @if(!Auth::user()->isStudent())
                <div class="card-header">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('results.export') }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-file-download"></i>
                            Export Data
                        </a>
                    </div>
                </div>
            @endif
            <div class="card-body">
                <table class="table table-bordered table-striped {{ count($results) > 0 ? 'datatable' : '' }}">
                    <thead>
                        <tr>
                            @if (!Auth::user()->isStudent())
                                <th>User</th>
                            @endif
                                <th>Subject</th>
                                <th>Exam title</th>
                                <th>Date</th>
                                <th>Result</th>
                            @if (!Auth::user()->isStudent())
                                <th style="width: 8%">&nbsp;</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($results) > 0)
                            @foreach ($results as $result)
                                <tr>
                                    @if (!Auth::user()->isStudent())
                                        <td>{{ $result->user->fname }} {{ $result->user->lname }}</td>
                                    @endif
                                        <td>{{ $result->exam->subject->title }}</td>
                                        <td>{{ $result->exam->title }} ({{ $result->exam->category->title }})</td>
                                        <td>{{ $result->created_at }}</td>
                                        <td>{{ $result->result }}/{{ count($result->exam->exam_questions) }}</td>
                                    @if (!Auth::user()->isStudent())
                                        <td style="text-align:center">
                                            <a href="{{ route('results.show',[$result->id]) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i> View</a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">No entries in table.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
