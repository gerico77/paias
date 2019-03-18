@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h3 class="page-title">Examination</h3>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            List
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped {{ count($tests) > 0 ? 'datatable' : '' }} dt-select">
                    <thead>
                        <th>Subject</th>
                        <th style="width:20%">&nbsp;</th>
                    </thead>
                    <tbody>
                        @if (count($tests) > 0)
                            @foreach ($tests as $test)
                                <tr data-entry-id="{{ $test->id }}">
                                    <td>{{ $test->subject->title }}</td>
                                    <td>
                                        <a href="{{ route('tests.create',[$test->id]) }}" class="btn btn-sm btn-success">
                                            <i class="fas fa-eye"></i>
                                            Take Exam
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
        window.route_mass_crud_entries_destroy = '{{ route('tests.mass_destroy') }}';
    </script>
@endsection