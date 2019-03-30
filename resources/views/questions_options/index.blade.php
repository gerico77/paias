@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="page-title">Questions Options</h3>

        <p>
            <a href="{{ route('questions_options.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i>
                Add New
            </a>
        </p>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                List
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped {{ count($questions_options) > 0 ? 'datatable' : '' }} dt-select">
                        <thead>
                            <tr>
                                <th style="text-align:center; width:5%"><input type="checkbox" id="select-all" /></th>
                                <th>Question</th>
                                <th>Option</th>
                                <th>Correct</th>
                                <th style="width:20%">&nbsp;</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @if (count($questions_options) > 0)
                                @foreach ($questions_options as $questions_option)
                                    <tr data-entry-id="{{ $questions_option->id }}">
                                        <td></td>
                                        <td>{{ $questions_option->question->question_text }}</td>
                                        <td>{{ $questions_option->option }}</td>
                                        <td>{{ $questions_option->correct == 1 ? 'Yes' : 'No' }}</td>
                                        <td>
                                            <a href="{{ route('questions_options.show',[$questions_option->id]) }}" class="btn btn-sm btn-success">
                                                <i class="fas fa-eye"></i>
                                                View
                                            </a>
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
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('questions_options.mass_destroy') }}';
    </script>
@endsection