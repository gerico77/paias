@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="page-title">Subjects</h3>
        
        @if (!Auth::user()->isProfessor())
            <p>
                <a href="{{ route('subjects.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i>
                    Add new
                </a>
            </p>
        @endif

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                List
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped {{ count($subjects) > 0 ? 'datatable' : '' }} dt-select">
                        <thead>
                            <th style="text-align:center; width:5%"><input type="checkbox" id="select-all" /></th>
                            <th>Course</th>
                            <th>Title</th>
                            <th style="width:20%">&nbsp;</th>
                        </thead>
                        
                        <tbody>
                            @if (count($subjects) > 0)
                                @foreach ($subjects as $subject)
                                    <tr data-entry-id="{{ $subject->id }}">
                                        <td></td>
                                        <td>{{ $subject->course->code}}</td>
                                        <td>{{ $subject->title}}</td>
                                        <td class="text-center">
                                            <a href="{{ route('subjects.show',[$subject->id]) }}" class="btn btn-sm btn-success">
                                                <i class="fas fa-eye"></i>
                                                View
                                            </a>
                                            @if(!Auth::user()->isProfessor())
                                            <a href="{{ route('subjects.edit',[$subject->id]) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </a>
                                            {!! Form::open(array(
                                                'style' => 'display: inline-block;',
                                                'method' => 'DELETE',
                                                'onsubmit' => "return confirm('Are you sure?');",
                                                'route' => ['subjects.destroy', $subject->id])) !!}
                                            {!! Form::button('<i class="fas fa-trash-alt"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-sm btn-danger')) !!}
                                            {!! Form::close() !!}
                                            @endif
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
    @if(!Auth::user()->isProfessor())
        <script>
            window.route_mass_crud_entries_destroy = '{{ route('subjects.mass_destroy') }}';
        </script>
    @endif
@endsection
