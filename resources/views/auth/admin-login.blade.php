@extends('auth.layout')

@section('content')

<div class="text-center">
    <a class="header-brand" ><i class="fa fa-gift brand-logo"></i></a>
    <div class="card-title mt-3">Login to your admin account</div>

</div>
                <form method="post" action="{{ route('admin.login') }}">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <h1 class="h3 mb-3 fw-normal">Admin Login</h1>

                    @if(isset ($errors) && count($errors) > 0)
                    <div class="alert alert-warning" role="alert">
                        <ul class="list-unstyled mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="form-group">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Username Or Email" required="required" autofocus>

                        @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">

                        @if ($errors->has('password'))
                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" />
                        <span class="custom-control-label">Remember me</span>
                        </label>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                    </div>

                </form>

@endsection