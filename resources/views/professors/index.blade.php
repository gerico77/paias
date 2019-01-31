@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
    <h3 class="page-title">@lang('Professors')</h3>
    <p>
        <a href="{{ route('professors.create') }}" class="btn btn-success">@lang('Add New')</a>
    </p>
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('List')
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($professors) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>@lang('Name')</th>
                        <th>@lang('Email')</th>
                        <th>@lang('Joining Date')</th>
                        <th>@lang('Designation')</th>
                        <th>@lang('Department')</th>
                        <th>@lang('Gender')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($professors) > 0)
                        @foreach ($professors as $professor)
                            <tr data-entry-id="{{ $professor->id }}">
                                <td></td>
                                <td>{{ $professor->name }}</td>
                                <td>{{ $professor->email }}</td>
                                <td>{{ $professor->joining_date}}</td>
                                <td>{{ $professor->designation}}</td>
                                <td>{{ $professor->department}}</td>
                                <td>{{ $professor->gender}}</td>
                                <td>{{ $user->role->title or '' }}</td>
                                <td>
                                    <a href="{{ route('professors.show',[$professor->id]) }}" class="btn btn-xs btn-primary">@lang('View')</a>
                                    <a href="{{ route('professors.edit',[$professor->id]) }}" class="btn btn-xs btn-info">@lang('Edit')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                                        'route' => ['professors.destroy', $professor->id])) !!}
                                    {!! Form::submit(trans('Delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">@lang('No entries in table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    </div>
@stop
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('professors.mass_destroy') }}';
    </script>
@endsection