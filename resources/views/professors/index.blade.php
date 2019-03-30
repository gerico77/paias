@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="page-title">Professors</h3>
            <p>
                <a href="{{ route('professors.create') }}" class="btn btn-primary btn-sm">
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
                <form action="{{ url('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="import_file"/>
                    <input type="submit" value="Import" class="btn btn-info btn-sm" /> &nbsp; &nbsp;
                    {{-- <i class="fas fa-file-upload"></i> --}}
                    <a href="{{ url('export') }}" class="btn btn-primary btn-sm"><i class="fas fa-file-download"></i> Export</a>
                </form>
                <table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }} dt-select">
                    <thead>
                        <tr>
                            <th style="text-align:center; width:5%"><input type="checkbox" id="select-all" /></th>
                            <th>Username</th>
                            <th>First Name</th>
                            <th>LastName</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th style="width:20%">&nbsp;</th>
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
                                    <td>{{ $user->role->title }}</td>
                                    <td>
                                        <a href="{{ route('professors.show',[$user->id]) }}" class="btn btn-sm btn-success"><i class="fas fa-eye"></i> View</a>
                                        <a href="{{ route('professors.edit',[$user->id]) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a>
                                        {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".trans("Are you sure?")."');",
                                            'route' => ['professors.destroy', $user->id])) !!}
                                        {!! Form::button('<i class="fas fa-trash-alt"></i> Delete', array('type' => 'submit', 'class' => 'btn btn-sm btn-danger')) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">No entries in table</td>
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
        window.route_mass_crud_entries_destroy = '{{ route('professors.mass_destroy') }}';
    </script>
@endsection