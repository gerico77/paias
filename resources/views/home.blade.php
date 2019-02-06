@extends('layouts.app') 
@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Course overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
            @if (count($courses) > 0)
                @foreach ($courses as $course)
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fas fa-fw fa-graduation-cap"></i>
                                </div>
                            <div class="mr-5">{{ $course->title }}</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="{{ route('questions.index') }}">
                                <span class="float-left">Manage course</span>
                                <span class="float-right">
                                    <i class="fas fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection