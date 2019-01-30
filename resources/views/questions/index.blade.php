@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>

    <h3 class="page-title">Questions</h3>

    <p>
        <a href="{{ route('questions.create') }}" class="btn btn-success">Add new</a>
    </p>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            List
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <th style="text-align:center;">
                            <input type="checkbox" id="select-all" />
                        </th>
                        <th>Subject</th>
                        <th>Question Text</th>
                        <th>&nbsp;</th>
                    </thead>
                    
                    <tbody>
                        @if (count($questions) > 0)
                            @foreach ($questions as $question)
                                <tr data-entry-id="{{ $question->id }}">
                                    <td></td>
                                    <td>{{ $question->subject->title or '' }}</td>
                                    <td>{!! $question->question_text !!}</td>
                                    <td>
                                        <a href="{{ route('questions.show',[$question->id]) }}" class="btn btn-xs btn-primary">View</a>
                                        <a href="{{ route('questions.edit',[$question->id]) }}" class="btn btn-xs btn-info">Edit</a>
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('Are you sure?');",
                                            'route' => ['questions.destroy', $question->id])) !!}
                                        {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                
                            @endforeach
                        @else
                            
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
