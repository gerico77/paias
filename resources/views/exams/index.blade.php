@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Exams</li>
        </ol>
 
        <div class="card mb-3">
            @if(!Auth::user()->isStudent())
                <div class="card-header">
                    <a href="{{ route('exams.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i>
                        Add new
                    </a>
                </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped {{ !Auth::user()->isStudent() ? (count($exams) > 0 ? 'datatable' : '') : '' }} dt-select">
                        <thead>
                            @if(!Auth::user()->isStudent())
                                <th style="text-align:center"><input type="checkbox" id="select-all" /></th>
                            @endif
                            <th>Exam Title</th>
                            <th>Subject</th>
                            <th>Start of Exam</th>
                            <th>&nbsp;</th>
                        </thead>
                        
                        <tbody>
                            @if (count($exams) > 0)
                                @foreach ($exams as $exam)
                                {{ $exam->students_answered }}
                                    @if (!count($tests->where('user_id', Auth::id())->where('exam_id', $exam->id)) > 0)
                                        <tr data-entry-id="{{ $exam->id }}">
                                            @if(!Auth::user()->isStudent())
                                                <td></td>
                                            @endif
                                            <td>{!! $exam->title !!}</td>
                                            <td>{{ $exam->subject->title }}</td>
                                            <td>{{ $exam->start_datetime }}</td>
                                            <td style="text-align:center">
                                                @if(!Auth::user()->isStudent())
                                                    <a href="{{ route('tests.index', ['exam_id' => $exam->id, 'user_id' => Auth::id() ]) }}" 
                                                       class="btn btn-sm btn-secondary {{ count($exam_questions->where('exam_id', $exam->id)) > 0 ? '' : 'disabled' }}">
                                                        <i class="fas fa-search"></i>
                                                        Preview
                                                    </a>
                                                    <a href="{{ route('item_analysis.show', ['id' => $exam->id]) }}" 
                                                       class="btn btn-sm btn-warning {{ count($exam->tests) > 0 && $exam->is_multichoice_only ? '' : 'disabled' }}">
                                                        <i class="fas fa-file-alt"></i>
                                                        Item Analysis
                                                    </a>
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

                                                @else
                                                    <a href="{{ route('tests.index', ['exam_id' => $exam->id, 'user_id' => Auth::id() ]) }}" class="btn btn-sm btn-secondary {{ $exam->isOpen() ? '' : 'disabled' }}">
                                                        <i class="fas fa-pen"></i>
                                                        Take Exam
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6">No entries in table</td>
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
