@extends ('menu')

@section('options')
<li class="nav-item {{ session('menu') == 'home' ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Home">
  <a class="nav-link" href="{{ route('user.home')}}">Home</a>
</li>
<li class="nav-item {{ session('menu') == 'profile' ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Profile">
  <a class="nav-link" href="{{ route('profile.index')}}">Profile</a>
</li>
<li class="nav-item {{ session('menu') == 'team' ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Team">
  <a class="nav-link" href="{{route('team')}}">Team</a>
</li>
<li class="nav-item {{ session('menu') == 'project' ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Project">
  <a class="nav-link" href="{{ route('projects.index') }}">Project</a>
</li>
<li class="nav-item {{ session('menu') == 'offers' ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Offers">
  <a class="nav-link" href="{{ route('offers') }}">Offers</a>
</li>
<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Divider">
  <hr />
</li>
<li class="nav-item {{ session('menu') == 'contest' ? 'active' : '' }}" data-toggle="tooltip" data-placement="right" title="Ongoing Contests">
  <a class="nav-link" href="{{ route('user.contests.index') }}">Ongoing Contests</a>
</li>
@endsection
