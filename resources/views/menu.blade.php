<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Main Font -->
	<script src="{{ asset('js/webfontloader.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {
				families: ['Roboto:300,400,500,700:latin']
			}
		});
	</script>

  <title>Collabs @yield('title')</title>

  <!-- Bootstrap core CSS-->
<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('bootstrap-v3.3.7/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">

<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('Bootstrap/css/bootstrap-reboot.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('Bootstrap/css/bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('Bootstrap/css/bootstrap-grid.css') }}">

<!-- Theme Styles CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/theme-styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/blocks.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/fonts.css') }}">

<!-- Styles for plugins -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/daterangepicker.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/swiper.min.css') }}">

<!-- Lightbox popup script-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/magnific-popup.css') }}">

<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">

<!-- ^ new --------------------------------------------- >

<!-- Custom fonts for this template-->
<link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<!-- Page level plugin CSS-->
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
<!-- Custom styles for this template-->
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<!-- Include Bootstrap Datepicker -->
<link rel="stylesheet" href="{{ asset('css/datepicker.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/datepicker3.min.css') }}" />

@yield('styles')

<!-- new - sub Header topBar ---------------------------------- >

<!-- Header -->

<header class="header" id="site-header">

	<div class="page-title">
		<h6 id="site-header-title">Collabs @yield('title')</h6>
	</div>

	<div class="header-content-wrapper">

		<div class="control-block">

      <!-- Chat Messages Notification Block Element -->
			<div class="control-icon more has-items">
				<svg class="olymp-chat---messages-icon"><use xlink:href="{{ asset('icons') }}/icons.svg#olymp-chat---messages-icon"></use></svg>
				<div class="label-avatar bg-purple">2</div>

				<div class="more-dropdown more-with-triangle triangle-top-center">
					<div class="ui-block-title ui-block-title-small">
						<h6 class="title">Chat / Messages</h6>
						<a href="#">Mark all as read</a>
						<!--<a href="#">Settings</a>-->
					</div>

					<div class="mCustomScrollbar" data-mcs-theme="dark">
						<ul class="notification-list chat-message">

							<!-- Message Unread Element -->
							<li class="message-unread">
								<div class="author-thumb">
									<img src="{{ asset('img') }}/avatar59-sm.jpg" alt="author">
								</div>
								<div class="notification-event">
									<a href="#" class="h6 notification-friend">Diana Jameson</a>
									<span class="chat-message-item">Hi James! It’s Diana, I just wanted to let you know that we have to reschedule...</span>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
								</div>
								<span class="notification-icon">
									<svg class="olymp-chat---messages-icon"><use xlink:href="{{ asset('icons') }}/icons.svg#olymp-chat---messages-icon"></use></svg>
								</span>
							</li>
							<!-- end Message Unread Element -->

							<!-- Message Read Element -->
							<li>
								<div class="author-thumb">
									<img src="{{ asset('img') }}/avatar60-sm.jpg" alt="author">
								</div>
								<div class="notification-event">
									<a href="#" class="h6 notification-friend">Jake Parker</a>
									<span class="chat-message-item">Great, I’ll see you tomorrow!.</span>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
								</div>
								<span class="notification-icon">
									<svg class="olymp-chat---messages-icon"><use xlink:href="{{ asset('icons') }}/icons.svg#olymp-chat---messages-icon"></use></svg>
								</span>
							</li>
							<!-- end Message Read Element -->

							<li>
								<div class="author-thumb">
									<img src="{{ asset('img') }}/avatar61-sm.jpg" alt="author">
								</div>
								<div class="notification-event">
									<a href="#" class="h6 notification-friend">Elaine Dreyfuss</a>
									<span class="chat-message-item">We’ll have to check that at the office and see if the client is on board with...</span>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 9:56pm</time></span>
								</div>
									<span class="notification-icon">
										<svg class="olymp-chat---messages-icon"><use xlink:href="{{ asset('icons') }}/icons.svg#olymp-chat---messages-icon"></use></svg>
									</span>
							</li>

							<!-- Team Message Read Element -->
							<li class="chat-group">
								<div class="author-thumb">
									<img src="{{ asset('img') }}/avatar11-sm.jpg" alt="author">
									<img src="{{ asset('img') }}/avatar12-sm.jpg" alt="author">
									<img src="{{ asset('img') }}/avatar13-sm.jpg" alt="author">
									<img src="{{ asset('img') }}/avatar10-sm.jpg" alt="author">
								</div>
								<div class="notification-event">
									<a href="#" class="h6 notification-friend">Team Name</a>
									<span class="last-message-author">Ed:</span>
									<span class="chat-message-item">Yeah! Seems fine by me!</span>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 16th at 10:23am</time></span>
								</div>
									<span class="notification-icon">
										<svg class="olymp-chat---messages-icon"><use xlink:href="{{ asset('icons') }}/icons.svg#olymp-chat---messages-icon"></use></svg>
									</span>
							</li>
							<!-- end Team Message Read Element -->

						</ul>
					</div>

					<a href="{{ route('message') }}" class="view-all bg-purple">View All Messages</a>
				</div>
			</div>
			<!-- end Chat Messages Notification Block Element -->

			<!-- Profile Button -->
			<div class="author-page author vcard inline-items more">
				<div class="author-thumb">
					<!-- Current User Image | eita silo > author-page.jpg -->
					<img alt="author" src="{{ asset('img') }}/fahim-pro-pic.png" class="avatar" style="width: 36px; height: 36px;">
					<span class="icon-status online"></span>
					<div class="more-dropdown more-with-triangle">
						<div class="ui-block-title ui-block-title-small">
							<h6 class="title">Your Account</h6>
						</div>

            <ul class="account-settings">
							<li>
								<a href="{{ route('profile.index')}}">

									<svg class="olymp-menu-icon"><use xlink:href="{{ asset('icons') }}/icons.svg#olymp-menu-icon"></use></svg>

									<span>Profile Settings</span>
								</a>
							</li>
							<li>
								<a href="#">
									<svg class="olymp-happy-face-icon left-menu-icon"><use xlink:href="{{ asset('icons') }}/icons.svg#olymp-happy-face-icon"></use></svg>

									<span>Update Profile</span>
								</a>
							</li>
							<li>
								<a href="{{ route('logout') }}">
									<svg class="olymp-logout-icon"><use xlink:href="{{ asset('icons') }}/icons.svg#olymp-logout-icon"></use></svg>

									<span>Log Out</span>
								</a>
							</li>
						</ul>

            @if(Session::get('is_user'))
              @yield('user-right-menu')
            @else
              @yield('company-right-menu')
            @endif


						<div class="ui-block-title ui-block-title-small">
							<h6 class="title">About Collabs</h6>
						</div>

						<ul>
							<li>
								<a href="#">
									<span>Terms and Conditions</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span>About</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span>Careers</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span>Reviews</span>
								</a>
							</li>
							<li>
								<a href="#">
									<span>Statistics</span>
								</a>
							</li>
						</ul>

					</div>
				</div>
				<a href="#" class="author-name fn">
					<div class="author-title">
						{{ (Session::has('username')) ? Session::get('username') : 'No Name' }} <svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{ asset('icons') }}/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
					</div>
					<span class="author-subtitle">{{ Session::get('is_user')? 'Developer' : 'Organization' }}</span>
				</a>
			</div>

		</div>
	</div>

</header>

<!-- ... end Header -->

<!-- ^newEnd ---------------------------------------------------->


</head>

<body>
  @yield('options')

  <!-- new ------------------------------------------------------>

  <div class="header-spacer"></div>


  <div class="container">
  	<div class="row">

  		<!-- Main Content -->

  		<main class="col-xl-6 push-xl-3 col-lg-12 push-lg-0 col-md-12 col-sm-12 col-xs-12">
        @include('alerts')

        @yield('content')

        <!--
  			<div id="newsfeed-items-grid">

  				<div class="ui-block">

  				</div>

  				<div class="ui-block">

  				</div>

  			</div>
        -->

  		</main>

  		<!-- ... end Main Content -->


      <!-- Left Sidebar -->
<!--
  		<aside class="col-xl-3 pull-xl-6 col-lg-6 pull-lg-0 col-md-6 col-sm-12 col-xs-12">

  		</aside>
-->
  		<!-- ... end Left Sidebar -->


  		<!-- Right Sidebar -->
<!--
  		<aside class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">



  		</aside>
-->
  		<!-- ... end Right Sidebar -->

  	</div>
  </div>




  <!-- ^newEnd -------------------------------------------------->












  <!-- jQuery first, then Other JS. -->
  <script src="{{ asset('js/jquery-3.2.0.min.js') }}"></script>

  <!-- Lightbox popup script-->
  <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>

  <!-- Swiper / Sliders -->
  <script src="{{ asset('js/swiper.jquery.min.js') }}"></script>

  <!-- Js effects for material design. + Tooltips -->
  <script src="{{ asset('js/material.min.js') }}"></script>
  <!-- Helper scripts (Tabs, Equal height, Scrollbar, etc) -->
  <script src="{{ asset('js/theme-plugins.js') }}"></script>
  <!-- Init functions -->
  <script src="{{ asset('js/main.js') }}"></script>

  <!-- Load more news AJAX script -->
  <script src="{{ asset('js/ajax-pagination.js') }}"></script>

  <!-- Select / Sorting script -->
  <script src="{{ asset('js/selectize.min.js') }}"></script>

  <!-- Datepicker input field script-->
  <script src="{{ asset('js/moment.min.js') }}"></script>
  <script src="{{ asset('js/daterangepicker.min.js') }}"></script>

  <script src="{{ asset('js/mediaelement-and-player.min.js') }}"></script>
  <script src="{{ asset('js/mediaelement-playlist-plugin.min.js') }}"></script>

  <script src="{{ asset('js/menu.js') }}"></script>



  <!-- ^ new --------------------------------------------- >

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <!-- Page level plugin JavaScript-->
  <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.js') }}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin.min.js') }}"></script>
  <!-- Custom scripts for this page-->
  <script src="{{ asset('js/sb-admin-datatables.min.js') }}"></script>
  <!--<script src="{{ asset('js/sb-admin-charts.min.js') }}"></script>-->
  <script src="{{ asset('js/sb-admin-charts.js') }}"></script>

  <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>

  @yield('page-scripts')
</body>

</html>
