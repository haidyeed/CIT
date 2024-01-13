<form action="{{route('tasks.store')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    @if(isset ($errors) && count($errors) > 0)
    <div class="alert alert-warning" role="alert">
        <ul class="list-unstyled mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card-body">
        <div class="row clearfix">

            <div class="col-lg-4 col-md-12">
                <label class="col-md-3 col-form-label">Title <span class="text-danger">*</span></label>
                <div class="form-group">
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Task Title">
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <label class="col-md-3 col-form-label">Description <span class="text-danger">*</span></label>
                <div class="form-group">
                    <textarea type="text" name="description" class="form-control" rows="4">{{{ old('description') }}}</textarea>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <label class="col-md-3 col-form-label">Assigned User <span class="text-danger">*</span></label>
                <div class="form-group">
                    <select class="form-control custom-select" name="assigned_to_id">
                        <option value=0 selected>Choose Assignee</option>

                        @forelse($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
            </div>

            {{--  Another way we can send admin id in a hidden input 
            by getting auth guard admin id 
            and remove this drop down list   --}}
            <div class="col-lg-6 col-md-6">
                <label class="col-md-3 col-form-label">Admin Name <span class="text-danger">*</span></label>
                <div class="form-group">
                    <select class="form-control custom-select" name="assigned_by_id">
                        <option value=0 selected>Choose Creator</option>

                        @forelse($admins as $admin)
                        <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
            </div>

            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>  
    
        </div>
    </div>
</form>

