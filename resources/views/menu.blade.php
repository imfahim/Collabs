<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Collabs @yield('title')</title>
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

</head>

<body class="fixed-nav sticky-footer">

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="#">Collab</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

@yield('options')

      </ul>
      <ul class="navbar-nav ml-auto pull-right">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
          <p class="navbar-text">Signed in as <strong>{{ (Session::has('username')) ? Session::get('username') : 'No Name' }}</strong></p>
        </div>
      </nav>

@include('alerts')

@yield('content')


    </div>


    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright bla</small>
        </div>
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

      </div>
    </footer>



  </div>
</body>

</html>
