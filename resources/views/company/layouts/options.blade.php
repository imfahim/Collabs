@extends ('menu')

@section('options')
  <!-- Fixed Sidebar Left -->

  <div class="fixed-sidebar">
  	<div class="fixed-sidebar-left sidebar--small" id="sidebar-left">
  		<a href="#" class="logo">
  			<img src="{{ asset('img/logo.png') }}" alt="Olympus">
  		</a>

  		<div class="mCustomScrollbar" data-mcs-theme="dark">
  			<ul class="left-menu">
  				<li>
  					<a href="#" class="js-sidebar-open">
  						<svg class="olymp-menu-icon left-menu-icon"><use xlink:href="{{ asset('icons') }}/icons.svg#olymp-menu-icon"></use></svg>
  					</a>
  				</li>
  				<li>
  					<a href="{{ route('company.home')}}">
  						<svg class="olymp-newsfeed-icon left-menu-icon"><use xlink:href="{{ asset('icons') }}/icons.svg#olymp-newsfeed-icon"></use></svg>
  					</a>
  				</li>
          <li>
  					<a href="{{ route('browse.users') }}">
  						<svg class="olymp-happy-face-icon left-menu-icon"><use xlink:href="{{ asset('icons') }}/icons.svg#olymp-happy-face-icon"></use></svg>
  					</a>
  				</li>
  				<li>
  					<a href="{{ route('browse.teams') }}">
  						<svg class="olymp-happy-faces-icon left-menu-icon"><use xlink:href="{{ asset('icons') }}/icons.svg#olymp-happy-faces-icon"></use></svg>
  					</a>
  				</li>
  				<li>
  					<a href="{{ route('browse.contests') }}">
  						<svg class="olymp-trophy-icon left-menu-icon"><use xlink:href="{{ asset('icons') }}/icons.svg#olymp-trophy-icon"></use></svg>
  					</a>
  				</li>
  				<hr />
          <li>
  					<a href="#">
  						<svg class="olymp-stats-icon left-menu-icon"><use xlink:href="{{ asset('icons') }}/icons.svg#olymp-stats-icon"></use></svg>
  					</a>
  				</li>
  			</ul>
  		</div>
  	</div>

  	<div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1">
  		<a href="#" class="logo">
  			<img src="{{ asset('img') }}/logo.png" alt="Olympus">
  			<h6 class="logo-title">Collabs</h6>
  		</a>

  		<div class="mCustomScrollbar" data-mcs-theme="dark">
  			<ul class="left-menu">
  				<li>
  					<a href="#" class="js-sidebar-open">
  						<svg class="olymp-close-icon left-menu-icon"><use xlink:href="{{ asset('icons') }}/icons.svg#olymp-close-icon"></use></svg>
  						<span class="left-menu-title">Collapse Menu</span>
  					</a>
  				</li>
  				<li>
  					<a href="{{ route('company.home')}}">
  						<svg class="olymp-newsfeed-icon left-menu-icon"><use xlink:href="{{ asset('icons') }}/icons.svg#olymp-newsfeed-icon"></use></svg>
  						<span class="left-menu-title">Home</span>
  					</a>
  				</li>
          <li>
  					<a href="{{ route('browse.users') }}">
  						<svg class="olymp-happy-face-icon left-menu-icon"><use xlink:href="{{ asset('icons') }}/icons.svg#olymp-happy-face-icon"></use></svg>
  						<span class="left-menu-title">Browse Users</span>
  					</a>
  				</li>
  				<li>
  					<a href="{{ route('browse.teams') }}">
  						<svg class="olymp-happy-faces-icon left-menu-icon"><use xlink:href="{{ asset('icons') }}/icons.svg#olymp-happy-faces-icon"></use></svg>
  						<span class="left-menu-title">Browse Teams</span>
  					</a>
  				</li>
  				<li>
  					<a href="{{ route('browse.contests') }}">
  						<svg class="olymp-trophy-icon left-menu-icon"><use xlink:href="{{ asset('icons') }}/icons.svg#olymp-trophy-icon"></use></svg>
  						<span class="left-menu-title">Ongoing Contests</span>
  					</a>
  				</li>
  				<hr />
          <li>
  					<a href="#">
  						<svg class="olymp-stats-icon left-menu-icon"><use xlink:href="{{ asset('icons') }}/icons.svg#olymp-stats-icon"></use></svg>
  						<span class="left-menu-title">Account Stats</span>
  					</a>
  				</li>
  			</ul>
  		</div>
  	</div>
  </div>

  <!-- ... end Fixed Sidebar Left -->



@endsection
