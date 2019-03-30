@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="page-title">Questions</h3>

        {!! Form::model($question, ['method' => 'PUT', 'route' => ['questions.update', $question->id]]) !!}
    
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-edit"></i>
                Edit
            </div>
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('subject_id', 'Subject*') !!}
                    {!! Form::select('subject_id', $subjects, old('subject_id'), ['class' => 'form-control']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('subject_id'))
                        <small class="form-text text-muted">
                            {{ $errors->first('subject_id') }}
                        </small>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('question_text', 'Question text*') !!}
                    {!! Form::textarea('question_text', old('question_text'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('question_text'))
                        <small class="form-text text-muted">
                            {{ $errors->first('question_text') }}
                        </small>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('answer_explanation', 'Answer explanation*') !!}
                    {!! Form::textarea('answer_explanation', old('answer_explanation'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <small class="form-text text-muted"></small>
                    @if($errors->has('answer_explanation'))
                        <small class="form-text text-muted">
                            {{ $errors->first('answer_explanation') }}
                        </small>
                    @endif
                </div>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#myModal">
                    <i class="fas fa-plus"></i>
                    Add Option
                </button>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Option</th>
                                <th>Correct</th>
                                <th style="width:20%">&nbsp;</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @if (count($questions_options) > 0)
                                @foreach ($questions_options as $questions_option)
                                    <tr>
                                        <td>{{ $questions_option->option }}</td>
                                        <td>{{ $questions_option->correct == 1 ? 'Yes' : 'No' }}</td>
                                        <td class="text-center">
                                            {!! Form::button('<i class="fas fa-edit"></i> Edit', ['class' => 'btn btn-sm btn-info', 'data-option' => $questions_option->option, 'data-correct' => $questions_option->correct, 'data-optionid' => $questions_option->id, 'data-toggle' => 'modal', 'data-target' => '#edit']) !!}
                                            {!! Form::button('<i class="fas fa-trash-alt"></i> Delete', ['class' => 'btn btn-sm btn-danger', 'data-optionid' => $questions_option->id, 'data-toggle' => 'modal', 'data-target' => '#delete']) !!}
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
                
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">New Option</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <form action="{{ route('questions_options.store') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    @include('questions_options.form')
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Edit Option</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <form action="{{ route('questions_options.update', 'test') }}" method="POST">
                                {{ method_field('patch') }} {{ csrf_field() }}
                                <div class="modal-body">
                                    <input type="hidden" name="questions_option_id" id="questions_option_id" value="">
                                    @include('questions_options.form')
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <form action="{{ route('questions_options.destroy', 'test') }}" method="POST">
                                {{ method_field ('delete') }} {{ csrf_field() }}
                                <div class="modal-body">
                                    <p class="text-center">
                                        Are you sure you want to delete this?
                                    </p>
                                    <input type="hidden" name="questions_option_id" id="questions_option_id" value="">
                
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
                                    <button type="submit" class="btn btn-warning">Yes, Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {!! Form::submit('Update', ['class' => 'btn btn-danger']) !!}
            </div>
        </div>  
        {!! Form::close() !!}
    </div>
@endsection

@section('javascript')
    <script>
        $('#edit').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var option = button.data('option') 
            var correct = button.data('correct') 
            var option_id = button.data('optionid') 
            var modal = $(this)
    
            modal.find('.modal-body #option').val(option);
            modal.find('.modal-body #correct').val(correct);
            modal.find('.modal-body #questions_option_id').val(option_id);
        })
        
        
        $('#delete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
    
            var option_id = button.data('optionid') 
            var modal = $(this)
    
            modal.find('.modal-body #questions_option_id').val(option_id);
        })
    </script>
@endsection