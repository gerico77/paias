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

                <!-- Icon Cards-->
                <div class="row">
                    @if (count($subjects) > 0)
                        @foreach ($subjects as $subject)
                            <div class="col-xl-4 col-sm-6 mb-3">
                                <div class="card text-white bg-primary o-hidden h-100">
                                    <div class="card-body">
                                        <div class="card-body-icon">
                                            <i class="fas fa-fw fa-book"></i>
                                        </div>
                                    <h4 class="mr-5">{{ $subject->title }}</h4>
                                    <small class="mr-5">{{ $subject->course->code }}</small>
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
                    @endif
                </div>
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