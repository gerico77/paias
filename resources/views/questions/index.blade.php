@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="page-title">Questions</h3>
    
        <p>
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#selectQuestionType">
                <i class="fas fa-plus"></i>
                Add New
            </button>              
        </p>
    
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                List
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped {{ count($questions) > 0 ? 'datatable' : '' }} dt-select">
                        <thead>
                            <th style="text-align:center; width:5%"><input type="checkbox" id="select-all" /></th>
                            <th>Subject</th>
                            <th>Question Text</th>
                            <th style="width:20%">&nbsp;</th>
                        </thead>
                        
                        <tbody>
                            @if (count($questions) > 0)
                                @foreach ($questions as $question)
                                    <tr data-entry-id="{{ $question->id }}">
                                        <td></td>
                                        <td>{{ $question->subject->title}}</td>
                                        <td>{!! $question->question_text !!}</td>
                                        <td>
                                            <a href="{{ route('questions.show', ['qtype' => $question->qtype, 'id' =>$question->id]) }}" class="btn btn-sm btn-success">
                                                <i class="fas fa-eye"></i>
                                                View
                                            </a>
                                            <a href="{{ route('questions.edit', ['qtype' => $question->qtype, 'id' =>$question->id]) }}" class="btn btn-sm btn-info">
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

    <!-- Modal -->
    <div class="modal fade" id="selectQuestionType" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Question Types</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="form-check">
                        {!! Form::radio('questionTypes', 'multichoice', true, array('class' => 'form-check-input', 'id' => 'multichoice')); !!}
                        {!! Form::label('multichoice', 'Multiple Choice', ['class' => 'form-check-label']) !!}
                    </div>
                    <div class="form-check">
                        {!! Form::radio('questionTypes', 'identification', false, array('class' => 'form-check-input', 'id' => 'identification')); !!}
                        {!! Form::label('identification', 'Identification', ['class' => 'form-check-label']) !!}
                    </div>
                    <div class="form-check">
                        {!! Form::radio('questionTypes', 'enumeration', false, array('class' => 'form-check-input', 'id' => 'enumeration')); !!}
                        {!! Form::label('enumeration', 'Enumeration', ['class' => 'form-check-label']) !!}
                    </div>
                    <div class="form-check">
                        {!! Form::radio('questionTypes', 'truefalse', false, array('class' => 'form-check-input', 'id' => 'truefalse')); !!}
                        {!! Form::label('truefalse', 'True or False', ['class' => 'form-check-label']) !!}
                    </div>
                    <div class="form-check">
                        {!! Form::radio('questionTypes', 'tier', false, array('class' => 'form-check-input', 'id' => 'tier')); !!}
                        {!! Form::label('tier', '3 Tier', ['class' => 'form-check-label']) !!}
                    </div>
                     <div class="form-check">
                        {!! Form::radio('questionTypes', 'rubrics', false, array('class' => 'form-check-input', 'id' => 'rubrics')); !!}
                        {!! Form::label('rubrics', 'Rubrics', ['class' => 'form-check-label']) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="button" id="btnProceed" class="btn btn-primary btn-sm">Proceed</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('questions.mass_destroy') }}';

        $(document).ready(function(){
            $("#btnProceed").click(function(){
                var question_types = $('input[name="questionTypes"]:checked').val();

                switch(question_types) {
                    case "multichoice":
                        document.location.href = "{{ route('questions.create', 'multichoice') }}";
                        
                        break;
                    case "identification":
                        document.location.href = "{{ route('questions.create', 'identification') }}";

                        break;
                    case "enumeration":
                        document.location.href = "{{ route('questions.create', 'enumeration') }}";

                        break;
                    case "truefalse":
                        document.location.href = "{{ route('questions.create', 'truefalse') }}";

                        break;
                    case "tier":
                        document.location.href = "{{ route('questions.create', 'tier') }}";

                        break;
                    case "rubrics":
                        document.location.href = "{{ route('questions.create', 'rubrics') }}";

                        break;
                }
            });
        });
    </script>
@endsection
