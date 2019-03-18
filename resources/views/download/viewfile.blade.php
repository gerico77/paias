@extends('layouts.app')

@section('content')

    <div class="wrapper">
        <section class="panel panel-primary">
            <div class="panel-heading">
                Lesson Files
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <th>Title</th>
                        <th>Upload Date</th>
                    </thead>
                    <tbody>
                    @foreach($downloads as $down)
                        <tr>
                            <td>
                                <a href="download/{{$down->file_title}}" download="{{$down->file_title}}" {{$down->file_title}}></a>
                            </td>
                            <td>{{$down->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>

@stop