@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="page-title">Roles</h3>
            <p>
                {{-- <a href="{{ route('roles.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a> --}}
            </p>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                List
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped {{ count($roles) > 0 ? 'datatable' : '' }} dt-select">
                    <thead>
                        <tr>
                            <th style="text-align:center; width:5%"><input type="checkbox" id="select-all" /></th>
                            <th>Title</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($roles) > 0)
                            @foreach ($roles as $role)
                                <tr data-entry-id="{{ $role->id }}">
                                    <td></td>
                                    <td>{{ $role->title }}</td>
                                    <td>
                                        <a href="{{ route('roles.show',[$role->id]) }}" class="btn btn-xs btn-success"><i class="fas fa-eye"></i> View</a>
                                        {{-- <a href="{{ route('roles.edit',[$role->id]) }}" class="btn btn-xs btn-info"><i class="fas fa-edit"></i> Edit</a>
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                                            'route' => ['roles.destroy', $role->id])) !!}
                                        {!! Form::submit(trans('Delete'), array('class' => 'btn btn-xs btn-danger')) !!} --}}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">No entries in table</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('roles.mass_destroy') }}';
    </script>
@endsection