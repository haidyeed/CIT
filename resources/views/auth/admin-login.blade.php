
<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="icon" href="favicon.ico" type="image/x-icon"/>

<title>:: Epic :: Login</title>

<!-- Bootstrap Core and vandor -->
<link rel="stylesheet" href="{{ asset('dashboard/assets/plugins/bootstrap/css/bootstrap.min.css') }}" />

<!-- Core css -->
<link rel="stylesheet" href="{{ asset('dashboard/assets/css/style.min.css') }}"/>

</head>
<body class="font-muli theme-cyan gradient">

<div class="auth option2">
    <div class="auth_left">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <a class="header-brand" ><i class="fa fa-gift brand-logo"></i></a>
                    <div class="card-title mt-3">Login to your account</div>

                </div>

                <form method="post" action="{{ route('admin.login') }}">

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

                    @if(Session::get('success', false))
                        <?php $data = Session::get('success'); ?>
                        @if (is_array($data))
                            @foreach ($data as $msg)
                                <div class="alert alert-warning" role="alert">
                                    <i class="fa fa-check"></i>
                                    {{ $msg }}
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-warning" role="alert">
                                <i class="fa fa-check"></i>
                                {{ $data }}
                            </div>
                        @endif
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


            </div>
        </div>        
    </div>
</div>

<!-- Start Main project js, jQuery, Bootstrap -->
<script src="{{ asset('dashboard/assets/bundles/lib.vendor.bundle.js') }}"></script>

<!-- Start project main js  and page js -->
<script src="{{ asset('dashboard/assets/js/core.js') }}"></script>
</body>
</html>