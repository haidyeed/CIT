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
            <ul class="nav nav-tabs page-header-tab">
                <li class="nav-item"><a href="#Task-all" class="nav-link active" data-toggle="tab">List View</a></li>
                <li class="nav-item"><a href="#Task-grid" class="nav-link" data-toggle="tab">Grid View</a></li>
                <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link"><i class="fa fa-plus"></i>Add New</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="section-body mt-4">
    <div class="container-fluid">
        <div class="tab-content">
            <div class="tab-pane active" id="Task-all">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-hover table-vcenter text-nowrap table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Admin Name</th>
                                    <th>Assigned Name</th>
                                    <th>Creating Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tasks as $task)
                                <tr>
                                    <td>
                                        {{$task->id}} 
                                    </td>
                                    <td><div class="font-15">{{ $task->title }}</div></td>
                                    <td><div class="font-15">{{ mb_substr($task->description ,0,20 )}} @if (strlen($task->description) > 20)...@endif</div></td>
                                    <td><div class="font-15">{{ $task->admin->name }}</div></td>
                                    <td><div class="font-15">{{ $task->user->name }}</div></td>
                                    <td><strong>{{ $task->created_at }}</strong></td>
                                    <td>
                                        <button type="button" class="btn btn-icon btn-sm viewTaskModal" data-toggle="modal" data-target="#ViewTask" title="View" id="{{ $task->id }}" data-attr-title="{{ $task->title }}" data-attr-description="{{ $task->description }}" data-attr-row="TaskName{{ $loop->iteration }}"><i class="fa fa-eye" data-toggle="modal"></i></button>
                                        <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-route="/dashboard/tasks/{{ $task->id }}"</button><i class="fa fa-trash-o text-danger"></i></button>
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                        <div class="text-center">
                            {{$tasks->links()}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="Task-grid">
                <div class="row">
                    @forelse($tasks as $task)
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body text-center ribbon">
                                <div class="ribbon-box green"><i class="fa fa-star"></i></div>

                                <h5 class="mb-0">{{ $task->title }}</h5>
                                <br>
                                <div>Assigned By: {{ $task->admin->name }}</div>
                                <div>Assigned To: {{ $task->user->name }}</div>
                                <div>created at: {{ $task->created_at }}</div>
                            </div>
                        </div>
                    </div>
                    @empty

                    @endforelse
                </div>
                <div class="text-center">
                    {{$tasks->links()}}
                </div>
            </div>

            <!-- View Modal -->
            <div class="modal fade" id="ViewTask" tabindex="-1" role="dialog" aria-labelledby="ViewModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">View Task <span id="view-task-id"></span></h5> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        @include('dashboard.tasks.view-form')
                    </div>
                </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection