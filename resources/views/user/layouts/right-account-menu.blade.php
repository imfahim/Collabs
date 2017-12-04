@extends('menu')

@section('user-right-menu')
  <div class="ui-block-title ui-block-title-small">
    <h6 class="title">Team Options</h6>
  </div>

  <ul class="account-settings">
    <li>
      <a href="{{route('team')}}">

        <svg class="olymp-happy-faces-icon left-menu-icon"><use xlink:href="{{ asset('icons') }}/icons.svg#olymp-happy-faces-icon"></use></svg>

        <span>Browse Your Teams</span>
      </a>
    </li>
    <li>
      <a href="{{route('team.create')}}">
        <span class="icon-add without-text">
          <svg class="olymp-happy-faces-icon left-menu-icon"><use xlink:href="{{ asset('icons') }}/icons.svg#olymp-happy-faces-icon"></use></svg>
        </span>
        <span>Create Team</span>
      </a>
    </li>
  </ul>

  <div class="ui-block-title ui-block-title-small">
    <h6 class="title">Project Options</h6>
  </div>

  <ul class="account-settings">
    <li>
      <a href="{{ route('projects.index') }}">

        <svg class="olymp-computer-icon left-menu-icon"><use xlink:href="{{ asset('icons') }}/icons.svg#olymp-computer-icon"></use></svg>

        <span>Browse Your Projects</span>
      </a>
    </li>
    <li>
      <a href="{{ route('projects.create') }}">
        <span class="icon-add without-text">
          <svg class="olymp-computer-icon left-menu-icon"><use xlink:href="{{ asset('icons') }}/icons.svg#olymp-computer-icon"></use></svg>
        </span>
        <span>Create Project</span>
      </a>
    </li>
  </ul>

  <div class="ui-block-title ui-block-title-small">
    <h6 class="title">Offers Options</h6>
  </div>

  <ul class="account-settings">
    <li>
      <a href="{{ route('offers') }}">

        <svg class="olymp-badge-icon left-menu-icon"><use xlink:href="{{ asset('icons') }}/icons.svg#olymp-badge-icon"></use></svg>

        <span>Browse Current Offers</span>
      </a>
    </li>
  </ul>
@endsection
