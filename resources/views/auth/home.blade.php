<!doctype html>
<html lang="en">

<body>

    <header class="p-3 bg-dark text-white">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

            @auth
              {{auth()->user()->name}}
              <p>{{ Auth::user()->email }}</p>

              <div class="text-end">
                <a href="{{ route('user.logout') }}" class="btn btn-outline-light me-2">Logout</a>
              </div>
            @endauth

            @guest
              @if(Auth::guard('admin')->check())
              {{auth()->guard('admin')->user()->name}}
              <p>{{ Auth::guard('admin')->user()->email }}</p>

              <div class="text-end">
                <a href="{{ route('admin.logout') }}" class="btn btn-outline-light me-2">Logout</a>
              </div>
              @else
                <div class="text-end">
                  <a href="{{ route('user.login') }}" class="btn btn-outline-light me-2">Login</a>
                  <a href="{{ route('user.register') }}" class="btn btn-warning">Sign-up</a>
                </div>
              @endif
            @endguest
        </div>
      </div>
    </header>

    <main class="container">

        <div class="bg-light p-5 rounded">
            @auth
            <h1>Authenticated User</h1>
            <p class="lead">Only authenticated users can access this section.</p>
            @endauth

            @guest
              @if(Auth::guard('admin')->check())
              <h1>Authenticated Admin</h1>
              <p class="lead">Only authenticated admins can access this section.</p>
              @else
                <h1>Guest Homepage</h1>
                <p class="lead">Your viewing the home page as a guest. Please login to view the restricted data.</p>
              @endif
            @endguest
        </div>

    </main>

  </body>
</html>