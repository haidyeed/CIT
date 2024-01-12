@extends('dashboard.layout')

@section('content')
<!-- Start Page title and tab -->
<div class="section-body">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center ">
            <div class="header-action">
                <h1 class="page-title">Tasks</h1>
                <ol class="breadcrumb page-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">CIT</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Task</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="section-body mt-4">
    <div class="container-fluid">
        <div class="tab-content">
            <div class="tab-pane active">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tasks</h3>
                                <div class="card-options ">
                                    <div class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></div>
                                    <div class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></div>
                                </div>
                            </div>
                            @include('dashboard.tasks.create-form')
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection