@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="page-title">Results</h3>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                List
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped {{ count($results) > 0 ? 'datatable' : '' }}">
                    <thead>
                        <tr>
                        @if(Auth::user()->isAdmin())
                            <th>User</th>
                        @endif
                            <th>Subject - Exam title</th>
                            <th>Date</th>
                            <th>Result</th>
                            <th style="width: 8%">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($results) > 0)
                            @foreach ($results as $result)
                                <tr>
                                @if(Auth::user()->isAdmin())
                                    <td>{{ $result->user->fname }} {{ $result->user->lname }} ({{ $result->user->email }})</td>
                                @endif
                                    <td>{{ $result->exam->subject->title . ' - ' . $result->exam->title }}</td>
                                    <td>{{ $result->created_at }}</td>
                                    <td>{{ $result->result }}/10</td>
                                    <td>
                                        <a href="{{ route('results.show',[$result->id]) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i> View</a>
                                    </td>
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
