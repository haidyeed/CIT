<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="canonical" href="{{url()->current()}}" />
<title>CIT Dashboard</title>

<!-- Bootstrap Core and vandor -->
<link rel="stylesheet" href="{{ asset('dashboard/assets/plugins/bootstrap/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('dashboard/assets/plugins/sweetalert/sweetalert.css') }}">

<!-- Core css -->
<link rel="stylesheet" href="{{ asset('dashboard/assets/css/style.min.css') }}"/>

<link rel="stylesheet" href="{{ asset('dashboard/assets/css/custom.css') }}"/>

</head>

<body class="close_rightbar font-muli theme-cyan gradient">

<!-- Page Loader -->
  <div class="page-loader-wrapper">
    <div class="loader">
    </div>
</div>

<div id="main_content">
    <!-- Start Main top header -->
    <div id="header_top" class="header_top">
        <div class="container">
            <div class="hleft">
                <a href="{{ route('dashboard') }}" class="header-brand"><i class="fa fa-gift brand-logo"></i></a>
                <div class="dropdown">
                    <a href="javascript:void(0)" class="nav-link icon menu_toggle"><i class="fe fe-align-center"></i></a>
                </div>
            </div>
            <div class="hright">
                <a href="{{ route('admin.logout') }}" class="nav-link icon settingbar"><i class="fe fe-power"></i></a>                
            </div>
        </div>
    </div>

    <!-- Start Main leftbar navigation -->
    <div id="left-sidebar" class="sidebar">
        <h5 class="brand-name">CIT<a href="{{ route('dashboard') }}" class="menu_option float-right"></a></h5>
        <ul class="nav nav-tabs">
            <li class="nav-item"><a href="#menu-uni" class="nav-link active">Admin</a></li>
        </ul>
        <div class="tab-content mt-3">
            <div class="tab-pane fade show active" id="menu-uni" role="tabpanel">
                <nav class="sidebar-nav">
                    <ul class="metismenu">
                        <li class="active"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                        <li class="g_heading">Home</li>
                        <li><a href="{{ route('tasks.index') }}"><i class="fa fa-list-ul"></i><span>List Tasks</span></a></li>
                        <li><a href="{{ route('dashboard') }}"><i class="fa fa-credit-card"></i><span>Create Task</span></a></li>
                    </ul>
                </nav>
            </div>

        </div>
    </div>
    <!-- Start project content area -->
    <div class="page">
        <!-- Start Page header -->
        <div class="section-body" id="page_top" >
            <div class="container-fluid">
                <div class="page-header">
                    <div class="left">                        
                    </div>
                    <div class="right">

                        <div class="notification d-flex">
                            <div class="dropdown d-flex">
                                <a href="javascript:void(0)" class="chip ml-3" data-toggle="dropdown">
                                    <span class="avatar"></span> {{ Auth::guard('admin')->user()->name }}</a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a href="{{ route('admin.logout') }}" class="dropdown-item"><i class="dropdown-icon fe fe-log-out"></i> Sign out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Page title and tab -->

        @yield('content')

        <!-- Start main footer -->
        <div class="section-body">
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            Copyright © {{ date('Y') }} Haidy Eed for CIT.
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>    
</div>

<!-- Start Main project js, jQuery, Bootstrap -->
<script src="{{ asset('dashboard/assets/bundles/lib.vendor.bundle.js') }}"></script>

<!-- Start all plugin js -->
<script src="{{ asset('dashboard/assets/plugins/sweetalert/sweetalert.min.js') }}"></script>

<!-- Start project main js  and page js -->
<script src="{{ asset('dashboard/assets/js/core.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/custom.js') }}"></script>

</body>
</html>
