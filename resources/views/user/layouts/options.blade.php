@extends ('menu')

@section('options')
<li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Home">
  <a class="nav-link" href="#">Home</a>
</li>
<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Profile">
  <a class="nav-link" href="{{ route('profile.index')}}">Profile</a>
</li>
<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Team">
  <a class="nav-link" href="{{route('team')}}">Team</a>
</li>
<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Project">
  <a class="nav-link" href="{{ route('projects.index') }}">Project</a>
</li>
<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Divider">
  <hr />
</li>
<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Ongoing Contests">
  <a class="nav-link" href="{{ route('user.contests.index') }}">Ongoing Contests</a>
</li>
@endsection
