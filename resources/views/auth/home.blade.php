
@extends('auth.layout')

@section('content')

<div class="text-center">
  <a class="header-brand" ><i class="fa fa-gift brand-logo"></i></a>

  @auth
  <div class="card-title mt-3">Hi {{auth()->user()->name}}, You are now logged in as a User</div>

  {{auth()->user()->name}}
  <p>{{ Auth::user()->email }}</p>

    <a href="{{ route('user.logout') }}">Logout</a>

    <div class="bg-light p-5 rounded">
      <h1>User</h1>
      <p class="lead">Only authenticated users can access this section.</p>
    </div>
  @endauth

  @guest
  @if(Auth::guard('admin')->check())
  <div class="card-title mt-3">Hi {{auth()->guard('admin')->user()->name}}, You are now logged in as an Admin</div>
  {{auth()->guard('admin')->user()->name}}
  <p>{{ Auth::guard('admin')->user()->email }}</p>

  <a href="{{ route('dashboard') }}">View Dashboard</a>
  <p> OR </p>
  <a href="{{ route('admin.logout') }}">Logout</a>

        <div class="bg-light p-5 rounded">
              <h1>Admin</h1>
              <p class="lead">Only authenticated admins can access this section.</p>
        </div>

  @else
      <div class="card-title mt-3">Hi, You can login or signup and have an account</div>

        <a href="{{ route('user.login') }}">Sign in</a>
        <p> OR </p>
        <a href="{{ route('user.register') }}">Create an account</a>
        <p> OR </p>
        <p> have an admin account ? <a href="{{ route('admin.login') }}">Sign in as Admin</a></p>
    
        <div class="bg-light p-5 rounded">
              <h1>Guest</h1>
              <p class="lead">You are viewing the home page as a guest.<br> Please login to view the restricted data.</p>
        </div>
  @endif
@endguest


@endsection