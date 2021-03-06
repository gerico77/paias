@extends('layouts.app')

@section('content')
    <div class="container-fluid">
    <h3 class="page-title">Questions</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['questions.store']]) !!}
    {!! Form::hidden('qtype', 'enumeration') !!}
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-plus"></i>
            Create
        </div>

        <div class="card-body">
            <div class="form-group">
                {!! Form::label('subject_id', 'Subject*') !!}
                {!! Form::select('subject_id', $subjects, old('subject_id'), ['class' => 'form-control', 'placeholder' => '']) !!}
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
                            <td><input type="text" name="option1[]" id="option1" placeholder="Enter Answer" class="form-control answerhere_list"></td>
                            <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                        </tr>
                    </table>
                </form>
            </div>
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
                $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="option1[]" id="option1" placeholder="Enter Answer" class="form-control answerhere_list"></td><td><button name="remove" id="'+i+'" class="btn btn-danger btn-sm btn_remove">X</button></td></tr>');
            });

            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $("#row"+button_id+"").remove();
            });
        });
    </script>
@endsection

