@extends('layouts.app')

@section('content')
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
        <a href="{{ route('questions.create') }}" class="btn btn-success btn-sm">
            <i class="fas fa-plus"></i>
            Add new
        </a>
    </p>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            List
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <th>Subject</th>
                        <th>Question Text</th>
                        <th style="width:30%">&nbsp;</th>
                    </thead>
                    
                    <tbody>
                        @if (count($questions) > 0)
                            @foreach ($questions as $question)
                                <tr data-entry-id="{{ $question->id }}">
                                    <td>{{ $question->subject->title}}</td>
                                    <td>{!! $question->question_text !!}</td>
                                    <td>
                                        <a href="{{ route('questions.show',[$question->id]) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-eye"></i>
                                            View
                                        </a>
                                        <a href="{{ route('questions.edit',[$question->id]) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </a>
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('Are you sure?');",
                                            'route' => ['questions.destroy', $question->id])) !!}
                                        {!! Form::button('<i class="fas fa-trash-alt"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-sm btn-danger')) !!}
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
@endsection
