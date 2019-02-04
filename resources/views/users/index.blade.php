@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
    <h3 class="page-title">@lang('Users')</h3>
    <p>
        <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> @lang('Add New')</a>
    </p>
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('List')
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>@lang('Usersname')</th>
                        <th>@lang('First Name')</th>
                        <th>@lang('LastName')</th>
                        <th>@lang('Users Email')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($users) > 0)
                        @foreach ($users as $user)
                            <tr data-entry-id="{{ $user->id }}">
                                <td></td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->fname }}</td>
                                <td>{{ $user->lname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('users.show',[$user->id]) }}" class="btn btn-xs btn-success"><i class="fas fa-eye"></i> @lang('View')</a>
                                    <a href="{{ route('users.edit',[$user->id]) }}" class="btn btn-xs btn-info"><i class="fas fa-edit"></i> @lang('Edit')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                                        'route' => ['users.destroy', $user->id])) !!}
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
@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('users.mass_destroy') }}';
    </script>
@endsection