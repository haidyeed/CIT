<p> Admin HOME </p>
<p>{{ Auth::guard('admin')->user()->name }}</p>
<p>{{ Auth::user()->email }}</p>

@auth
{{auth()->user()->name}}
<div class="text-end">
  <a href="{{ route('admin.logout') }}" class="btn btn-outline-light me-2">Logout</a>
</div>
@endauth