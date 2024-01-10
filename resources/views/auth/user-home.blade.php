<p> USER HOME </p>
<p>{{ Auth::user()->name }}</p>
<p>{{ Auth::user()->email }}</p>

@auth
{{auth()->user()->name}}
<div class="text-end">
  <a href="{{ route('user.logout') }}" class="btn btn-outline-light me-2">Logout</a>
</div>
@endauth