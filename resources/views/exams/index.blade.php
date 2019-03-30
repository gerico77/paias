@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="page-title">Exams</h3>
 
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                List
            </div>
            <div class="card-body">
                <p>
                    <a href="{{ route('exams.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i>
                        Add new
                    </a>
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped {{ count($exams) > 0 ? 'datatable' : '' }} dt-select">
                        <thead>
                            <th style="text-align:center"><input type="checkbox" id="select-all" /></th>
                            <th>Exam Title</th>
                            <th>Subject</th>
                            <th>Created by</th>
                            <th>&nbsp;</th>
                        </thead>
                        
                        <tbody>
                            @if (count($exams) > 0)
                                @foreach ($exams as $exam)
                                    <tr data-entry-id="{{ $exam->id }}">
                                        <td></td>
                                        <td>{!! $exam->title !!}</td>
                                        <td>{{ $exam->subject->title }}</td>
                                        <td>{{ $exam->user->fname . ' ' . $exam->user->lname }}</td>
                                        <td style="text-align:center">
                                            @if (count($exam_questions->where('exam_id', $exam->id)) > 0)
                                                <a href="{{ route('tests.index', ['exam_id' => $exam->id, 'user_id' => Auth::id() ]) }}" class="btn btn-sm btn-secondary">
                                                    <i class="fas fa-search"></i>
                                                    Preview
                                                </a>
                                            @endif
                                            <a href="{{ route('exams.show', ['id' => $exam->id]) }}" class="btn btn-sm btn-success">
                                                <i class="fas fa-eye"></i>
                                                View
                                            </a>
                                            <a href="{{ route('exams.edit', ['id' => $exam->id]) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </a>
                                            {!! Form::open(array(
                                                'style' => 'display: inline-block;',
                                                'method' => 'DELETE',
                                                'onsubmit' => "return confirm('Are you sure?');",
                                                'route' => ['exams.destroy', $exam->id])) !!}
                                            {!! Form::button('<i class="fas fa-trash-alt"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-sm btn-danger')) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">No entries in table</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('exams.mass_destroy') }}';
    </script>
@endsection
