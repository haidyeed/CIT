@extends('dashboard.layout')

@section('content')
<!-- Start Page title and tab -->
<div class="section-body">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center ">
            <div class="header-action">
                <h1 class="page-title">Task</h1>
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
            <div class="tab-pane active" id="TaskBoard-all">
                <div class="row clearfix mt-2">
                    @forelse($topUsers as $key => $user)
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <h6>{{ $user->user->name }}</h6>
                                <p>assigned to <h4>{{ $user->tasks_count }}</h4> tasks</p>
                                <input type="text" class="knob" value="{{ $user->tasks_count }}" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="@if($key< 3) #2185d0 @elseif($key < 5) #f2711c @elseif($key<8) #21ba45 @else #e03997 @endif">
                            </div>
                        </div>
                    </div>
                
                    @empty

                    @endforelse
                </div>
            </div>

        </div>
    </div>
</div>


@endsection