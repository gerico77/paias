@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <h3 class="page-title">{{ $exam->subject->title . ' - ' . $exam->title }}</h3>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-eye"></i>
                View
            </div>

            <div class="card-body">    
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-sm table-bordered">
                            <tr><th>Title</th><td>{{ $exam->title }}</td></tr>
                            <tr><th>Category</th><td>{{ $exam->category->title }}</td></tr>
                            <tr><th>Start Date</th><td>{{ $exam->start_date }}</td></tr>
                            <tr><th>Start Time</th><td>{{ $exam->start_time }}</td></tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-sm table-bordered">
                            <tr><th>No. of Questions</th><td>{{ count($exam_questions) }}</td></tr>
                            <tr><th>Subject</th><td>{{ $exam->subject->title }}</td></tr>
                            <tr><th>Created By</th><td>{{ $exam->user->fname . ' ' . $exam->user->lname }}</td></tr>
                            <tr><th>Created At</th><td>{{ $exam->created_at }}</td></tr>
                        </table>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                        <i class="fas fa-plus"></i>
                        Add questions from Question Bank
                    </button>
                </div>

                <br />
                @if (count($exam_questions) > 0)
                    <table class="table table-hover">
                        @foreach ($exam_questions as $exam_question)
                            <tbody>
                                <tr>
                                    <td class="text-center">{{ $exam_question->question->question_text }}</td>
                                    <td class="text-center">
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('Are you sure?');",
                                            'route' => ['exam_questions.destroy', $exam_question->id])) !!}
                                        {!! Form::button('<i class="fas fa-trash-alt"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-sm btn-danger')) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                @else
                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        No questions have been added yet
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
    
                <br />
                <a href="{{ route('exams.index') }}" class="btn btn-default btn-sm">Back to list</a>
            </div>
        </div>  
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Question Bank - {{ $exam->subject->title }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    @include('exam_questions.form')
                </div>
            </div>
        </div>
    </div>

@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_create = '{{ route('exam_questions.mass_create') }}';
    </script>
@endsection