{!! Form::hidden('question_id', $question->id) !!}
<div class="form-group">
    {!! Form::label('option', 'Option*', ['class' => 'control-label']) !!}
    {!! Form::text('option', old('option'), ['class' => 'form-control', 'placeholder' => '']) !!}
    <small class="form-text text-muted"></small>
    @if($errors->has('option'))
        <small class="form-text text-muted">
            {{ $errors->first('option')}}
        </small>
    @endif
</div>
<div class="form-group">
    {!! Form::label('correct', 'Correct', ['class' => 'control-label']) !!}
    {!! Form::hidden('correct', 0) !!}
    {!! Form::checkbox('correct', 1, old('correct', 0), ['class' => 'form-control']) !!}
    <small class="form-text text-muted"></small>
    @if($errors->has('correct'))
        <small class="form-text text-muted">
            {{ $errors->first('correct') }}
        </small>
    @endif
</div>