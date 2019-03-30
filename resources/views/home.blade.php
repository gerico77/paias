@extends('layouts.app') 
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-9">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/home">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Subject overview</li>
                </ol>

                @if (count($enrolls) > 0)
                    <!-- Icon Cards-->
                    <div class="row">
                        @foreach ($enrolls as $enroll)
                            <div class="col-xl-4 col-sm-6 mb-3">
                                <div class="card text-white bg-primary o-hidden h-100">
                                    <div class="card-body">
                                        <div class="card-body-icon">
                                            <i class="fas fa-fw fa-book"></i>
                                        </div>
                                    <h4 class="mr-5">{{ $enroll->subject->title }}</h4>
                                    <small class="mr-5">{{ $enroll->subject->course->code }}</small>
                                    </div>
                                    <a class="card-footer text-white clearfix small z-1" href="#">
                                        <span class="float-left">Manage subject</span>
                                        <span class="float-right">
                                            <i class="fas fa-angle-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-danger" role="alert">
                        No enrolled subjects.
                    </div>
                @endif
            </div>
            <div class="col-sm-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Events</li>
                </ol>
                @include('partials.calendar')
            </div>
        </div>
    </div>
@endsection