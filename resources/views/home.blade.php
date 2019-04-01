@extends('layouts.app') 
@section('content')
    <div class="container-fluid">
        {{-- <div class="row">
            <div class="col-sm-9"> --}}
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">My Subjects</li>
                </ol>

                @if (count($subjects) > 0)
                    <!-- Icon Cards-->
                    <div class="row">
                        @foreach ($subjects as $subject)
                            <div class="col-sm-3 mb-3">
                                <div class="card text-white bg-primary o-hidden h-100">
                                    <div class="card-body">
                                        <div class="card-body-icon">
                                            <i class="fas fa-fw fa-book"></i>
                                        </div>
                                        
                                        <h4 class="mr-5">{{ $subject->title }}</h4>
                                        <small class="mr-5">{{ $subject->course->code }}</small>
                                    </div>
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
            {{-- <div class="col-sm-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Events</li>
                </ol>
                @include('partials.calendar')
            </div>
        </div> --}}
    </div>
@endsection