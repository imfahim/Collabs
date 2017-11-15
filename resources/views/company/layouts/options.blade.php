@extends ('menu')

@section('options')
        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Home">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Company Info">
          <a class="nav-link" href="{{ route('companyprofile.index')}}">Company Info</a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Contest">
          <a class="nav-link" href="{{ route('contests.index') }}">Contest</a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Hire">
          <a class="nav-link" href="{{ route('hire.index') }}">Hire</a>
        </li>
@endsection
