@extends('layouts.webview')

@section('content')
@inject('request', 'Illuminate\Http\Request')
    <div class="container-fluid">
        <h3 class="page-title">{{ $exam_questions->first()->exam->subject->title . ' - ' . $exam_questions->first()->exam->title }}</h3>
        {!! Form::open(['method' => 'POST', 'route' => ['tests.store']]) !!}
        {!! Form::hidden('exam_id', $request->segment(2)) !!}
        {!! Form::hidden('user_id', $request->segment(3)) !!}

        @if(count($exam_questions) > 0)
            <?php $i = 1; ?>
            @foreach($exam_questions as $exam_question)
                <div class="card mb-3">
                    <div class="form-group">
                        <div class="form-group">
                            <div class="card-header">
                                <strong>Question {{ $i }}</strong>
                            </div>
                            <div class="card-body">       
                                <strong>{!! nl2br($exam_question->question->question_text) !!}</strong>
                            
                                <input type="hidden" name="questions[{{ $i }}]" value="{{ $exam_question->question->id }}">
                                
                                @foreach($exam_question->question->options as $option)
                                    <br>
                                    <label class="radio-inline">
                                        <input
                                            type="radio"
                                            name="answers[{{ $exam_question->question->id }}]"
                                            value="{{ $option->id }}">
                                        {{ $option->option }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            <?php $i++; ?>
            @endforeach
            {!! Form::submit(trans('Submit Quiz'), ['class' => 'btn btn-success']) !!}

        @endif

    
    {!! Form::close() !!}
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
