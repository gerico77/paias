@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>

    <!-- Icon Cards-->
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                <i class="fas fa-fw fa-question-circle"></i>
                </div>
                <div class="mr-5">Question Pool</div>
            </div>
        <a class="card-footer text-white clearfix small z-1" href="{{ route('questions.index') }}">
                <span class="float-left">Manage questions</span>
                <span class="float-right">
                <i class="fas fa-angle-right"></i>
                </span>
            </a>
            </div>
        </div>
    </div>
</div>
@endsection
