<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Main Font -->
	<script src="{{ asset('default/js/webfontloader.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {
				families: ['Roboto:300,400,500,700:latin']
			}
		});
	</script>

  <title>Collabs @yield('title')</title>

  <!-- Bootstrap core CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('default/Bootstrap/dist/css/bootstrap-reboot.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('default/Bootstrap/dist/css/bootstrap.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('default/Bootstrap/dist/css/bootstrap-grid.css') }}">




<!-- Theme Styles CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('default/css/theme-styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('default/css/blocks.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('default/css/fonts.css') }}">

<!-- Styles for plugins -->
<link rel="stylesheet" type="text/css" href="{{ asset('default/css/jquery.mCustomScrollbar.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('default/css/daterangepicker.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('default/css/bootstrap-select.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('default/css/swiper.min.css') }}">

<!-- Lightbox popup script-->
<link rel="stylesheet" type="text/css" href="{{ asset('default/css/magnific-popup.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('default/css/font-awesome.min.css') }}">

<!-- ^ new --------------------------------------------- >
<!-- Bootstrap core CSS-->

<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('bootstrap-v3.3.7/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">

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
<style>
p {
    font-size: 20px;
}
</style>
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
				<svg class="olymp-chat---messages-icon"><use xlink:href="{{ asset('default/icons') }}/icons.svg#olymp-chat---messages-icon"></use></svg>

				<div class="more-dropdown more-with-triangle triangle-top-center">
					<div class="mCustomScrollbar" data-mcs-theme="dark">
						<ul class="notification-list chat-message">

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
					<img alt="author" src="{{ asset('default/img') }}/fahim-pro-pic.png" class="avatar" style="width: 36px; height: 36px;">
					<span class="icon-status online"></span>
					<div class="more-dropdown more-with-triangle">
						<div class="ui-block-title ui-block-title-small">
							<h6 class="title">Your Account</h6>
						</div>

            <ul class="account-settings">
							<li>
								@if(session('is_user'))<a href="{{ route('profile.index')}}">
                @else <a href="{{ route('companyprofile.index')}}">
                @endif

									<svg class="olymp-menu-icon"><use xlink:href="{{ asset('default/icons') }}/icons.svg#olymp-menu-icon"></use></svg>

									<span>Profile Settings</span>
								</a>
							</li>
							<li>
								<a href="#">
									<svg class="olymp-happy-face-icon left-menu-icon"><use xlink:href="{{ asset('default/icons') }}/icons.svg#olymp-happy-face-icon"></use></svg>

									<span>Update Profile</span>
								</a>
							</li>
							<li>
								<a href="{{ route('logout') }}">
									<svg class="olymp-logout-icon"><use xlink:href="{{ asset('default/icons') }}/icons.svg#olymp-logout-icon"></use></svg>

									<span>Log Out</span>
								</a>
							</li>
						</ul>





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
						{{ (Session::has('username')) ? Session::get('username') : 'No Name' }} <svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{ asset('default/icons') }}/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
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


  		<!-- Main Content -->


        @include('alerts')

        @yield('content')

  </div>




  <!-- ^newEnd -------------------------------------------------->












  <!-- jQuery first, then Other JS. -->
  <script src="{{ asset('default/js/jquery-3.2.0.min.js') }}"></script>

  <!-- Lightbox popup script-->
  <script src="{{ asset('default/js/jquery.magnific-popup.min.js') }}"></script>

  <!-- Swiper / Sliders -->
  <script src="{{ asset('default/js/swiper.jquery.min.js') }}"></script>

  <!-- Js effects for material design. + Tooltips -->
  <script src="{{ asset('default/js/material.min.js') }}"></script>
  <!-- Helper scripts (Tabs, Equal height, Scrollbar, etc) -->
  <script src="{{ asset('default/js/theme-plugins.js') }}"></script>
  <!-- Init functions -->
  <script src="{{ asset('default/js/main.js') }}"></script>

  <!-- Load more news AJAX script -->
  <script src="{{ asset('default/js/ajax-pagination.js') }}"></script>

  <!-- Select / Sorting script -->
  <script src="{{ asset('default/js/selectize.min.js') }}"></script>

  <!-- Datepicker input field script-->
  <script src="{{ asset('default/js/moment.min.js') }}"></script>
  <script src="{{ asset('default/js/daterangepicker.min.js') }}"></script>

  <script src="{{ asset('default/js/mediaelement-and-player.min.js') }}"></script>
  <script src="{{ asset('default/js/mediaelement-playlist-plugin.min.js') }}"></script>

  <script src="{{ asset('default/js/menu.js') }}"></script>



  <!-- ^ new --------------------------------------------- >
  <!-- Bootstrap core JavaScript-->

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
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
<script src="{{ asset('js/main.js') }}"></script>

<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>

  @yield('page-scripts')
</body>

</html>
