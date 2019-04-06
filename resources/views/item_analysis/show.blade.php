@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('exams.index') }}">Exams</a>
            </li>
            <li class="breadcrumb-item active">Item Analysis</li>
        </ol>

        <div class="d-flex justify-content-between">
            <div>
                <table class="table table-sm table-borderless">
                    <tr>
                        <th>SUBJECT</th>
                        <th>&nbsp;:&nbsp;</th>
                        <th>{{ $exam_questions->first()->exam->subject->title }}</th>
                    </tr>
                    <tr>
                        <th>INSTRUCTOR</th>
                        <th>&nbsp;:&nbsp;</th>
                        <th>{{ $exam_questions->first()->exam->user->fullname }}
                    </tr>
                </table>
            </div>
            <div>
                <table class="table table-sm table-borderless">
                    <tr>
                        <th>S/Y</th>
                        <th>&nbsp;:&nbsp;</th>
                        <th>2018 - 2019</th>
                    </tr>
                    <tr>
                        <th>TOTAL</th>
                        <th>&nbsp;:&nbsp;</th>
                        <th>{{ count($exam_questions) }}
                    </tr>
                </table>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm text-center">
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th colspan="2">&nbsp;</th>
                        <th colspan="2">A</th>
                        <th colspan="2">B</th>
                        <th colspan="2">C</th>
                        <th colspan="2">D</th>
                        <th colspan="2">E</th>
                    </tr>
                    <tr>
                        <th>ITEM</th>
                        <th>KEY</th>
                        <th colspan="2">DIFFICULTY</th>
                        <th>St</th><th>OK</th>
                        <th>St</th><th>OK</th>
                        <th>St</th><th>OK</th>
                        <th>St</th><th>OK</th>
                        <th>St</th><th>OK</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($exam_questions) > 0)
                        @php
                            $question_no = 1;
                        @endphp
                        @foreach ($exam_questions as $exam_question)
                            <tr>
                                {{-- ITEMS --}}
                                <td>
                                    <a href="{{ route('questions.show', ['qtype' => $exam_question->question->qtype, 'id' => $exam_question->question->id]) }}">
                                        {{ $question_no }}. 
                                    </a>
                                </td>

                                {{-- KEY --}}
                                @php
                                    $i = 0;
                                    $options = array('A', 'B', 'C', 'D', 'E');
                                @endphp
                                @foreach ($exam_question->question->options as $option)
                                    @if ($option->correct == 1)
                                        <td>{{ $options[$i] }}</td>
                                    @endif
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach

                                {{-- DIFFICULTY --}}
                                <td>{{ $exam_question->difficulty }}</td>
                                <td>{{ $exam_question->difficulty_identifier }}</td>
                                
                                {{-- ITEMS --}}
                                @foreach ($exam_question->question->options as $option)
                                    <td>{{ count($exam_question->students_answered->whereIn('option_id', $option->id)) }}</td>
                                    <td>{{ $option->correct == 1 ? 'Y' : 'N' }}</td>
                                @endforeach
                                @for ($i = 0; $i < (5 - count($exam_question->question->options)); $i++)
                                    <td></td>
                                    <td></td>
                                @endfor
                            </tr>
                            @php
                                $question_no++;
                            @endphp
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
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('questions_options.mass_destroy') }}';
    </script>
@endsection