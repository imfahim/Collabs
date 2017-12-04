@extends('menu')

@section('company-right-menu')
  <div class="ui-block-title ui-block-title-small">
    <h6 class="title">Contest Options</h6>
  </div>

  <ul class="account-settings">
    <li>
      <a href="{{ route('contests.index') }}">

        <svg class="olymp-trophy-icon left-menu-icon"><use xlink:href="{{ asset('icons') }}/icons.svg#olymp-trophy-icon"></use></svg>

        <span>Browse Your Contests</span>
      </a>
    </li>
    <li>
      <a href="{{ route('contests.create') }}">
        <span class="icon-add without-text">
          <svg class="olymp-trophy-icon left-menu-icon"><use xlink:href="{{ asset('icons') }}/icons.svg#olymp-trophy-icon"></use></svg>
        </span>
        <span>Create Contest</span>
      </a>
    </li>
  </ul>

  <div class="ui-block-title ui-block-title-small">
    <h6 class="title">Hire Options</h6>
  </div>

  <ul class="account-settings">
    <li>
      <a href="{{ route('hire.index') }}">

        <svg class="olymp-badge-icon left-menu-icon"><use xlink:href="{{ asset('icons') }}/icons.svg#olymp-badge-icon"></use></svg>

        <span>Hires Panel</span>
      </a>
    </li>
  </ul>
@endsection
