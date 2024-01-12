
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

                @yield('content')

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