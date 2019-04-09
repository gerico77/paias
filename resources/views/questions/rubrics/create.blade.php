@extends('layouts.app')

@section('content')
    <div class="container-fluid">
    <h3 class="page-title">Questions</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['questions.store']]) !!}
    {!! Form::hidden('qtype', 'identification') !!}
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-plus"></i>
            Create
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
                <form class="add_answerhere" id="add_answerhere">
                    <table class="table table-bordered" id="dynamic_field">
                        <tr>
                            <td><label>Possible Answer:</label><input type="text" name="option1[]" id="option1" placeholder="Enter Answer" class="form-control answerhere_list"></td>
                            <td><label>Points Category:</label>
                                <select class="form-control">
                                <option value="1.0">100%</option>
                                <option value="0.5">50%</option>
                                <option value="0.25">25%</option>
                                <option value="0.4">40%</option>
                                <option value="0.05">5%</option>
                                <option value="0.005">0.5%</option>
                            </select></td>
                            <td><br><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                        </tr>
                    </table>
                </form>
            </div>
            {!! Form::hidden('correct', 'option1') !!}
            <div class="form-group">
                {!! Form::label('answer_explanation', 'Answer explanation*', ['class' => 'control-label']) !!}
                {!! Form::textarea('answer_explanation', old('answer_explanation'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                <small class="form-text text-muted"></small>
                @if($errors->has('answer_explanation'))
                    <small class="form-text text-muted">
                        {{ $errors->first('answer_explanation') }}
                    </small>
                @endif
            </div>

            {!! Form::submit('Save', ['class' => 'btn btn-success btn-sm']) !!}
            <a href="{{ route('questions.index') }}" class="btn btn-default btn-sm">Back to list</a>
        </div>
    </div>
    {!! Form::close() !!}
    </div>
@stop
@section('javascript')
    <script>
        $(document).ready(function() {
            
            var i = 1;
            $('#add').click(function() {
                i++;
                $('#dynamic_field').append('<tr id="row'+i+'"><td><label>Possible Answer:</label><input type="text" name="option1[]" id="option1" placeholder="Enter Answer" class="form-control answerhere_list"></td><td><label>Points Category:</label><select class="form-control"><option value="1.0">100%</option><option value="0.5">50%</option><option value="0.25">25%</option><option value="0.4">40%</option><option value="0.05">5%</option><option value="0.005">0.5%</option></select></td><td><br><button name="remove" id="'+i+'" class="btn btn-danger btn-sm btn_remove">X</button></td></tr>');
            });

            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $("#row"+button_id+"").remove();
            });
        });
    </script>
@endsection

