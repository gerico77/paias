@extends('layouts.webview')

@section('content')
    <div class="container-fluid">
        <h3 class="page-title">Quiz</h3>
        {!! Form::open(['method' => 'POST', 'route' => ['tests.store']]) !!}

        <div class="card mb-3">
            <div class="card-header">
                Multiple Choice
            </div>
            <?php //dd($questions) ?>
        @if(count($questions) > 0)
            <div class="card-body">
            <?php $i = 1; ?>
            @foreach($questions as $question)
                @if ($i > 1) <hr /> @endif
                <div class="form-group">
                    <div class="form-group">
                    <strong>Question {{ $i }}.<br />{!! nl2br($question->question_text) !!}</strong>

                    @if ($question->code_snippet != '')
                        <div class="code_snippet">{!! $question->code_snippet !!}</div>
                    @endif

                    <input
                        type="hidden"
                        name="questions[{{ $i }}]"
                        value="{{ $question->id }}">
                    @foreach($question->options as $option)
                        <br>
                        <label class="radio-inline">
                            <input
                                type="radio"
                                name="answers[{{ $question->id }}]"
                                value="{{ $option->id }}">
                            {{ $option->option }}
                        </label>
                    @endforeach
                </div>
                </div>
            <?php $i++; ?>
            @endforeach
            {!! Form::submit(trans('Submit Quiz'), ['class' => 'btn btn-success']) !!}

            </div>
        @endif

    
    {!! Form::close() !!}
    </div>
@stop

@section('javascript')
    @parent
    <script src="{{ asset('js/timepicker.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
    <script>
        $('.datetime').datetimepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}",
            timeFormat: "hh:mm:ss"
        });
    </script>

@stop
