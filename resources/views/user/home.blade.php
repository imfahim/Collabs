@extends ('user.layouts.options')

@section('title', ' | Developer Home')

@section('content')
<div class="row">
  <div class="col-lg-3 col-sm-6">
    <div class="circle-tile ">
      <a href="{{route('browse.users')}}"><div class="circle-tile-heading dark-blue"><i class="fa fa-user fa-fw fa-3x"></i></div></a>
      <div class="circle-tile-content dark-blue">
        <div class="circle-tile-description text-faded">Total Users</div>
        <div class="circle-tile-number text-faded ">{{ $users_count }}</div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6">
    <div class="circle-tile ">
      <a href="{{route('browse.teams')}}"><div class="circle-tile-heading red"><i class="fa fa-users fa-fw fa-3x"></i></div></a>
      <div class="circle-tile-content red">
        <div class="circle-tile-description text-faded"> Total Teams </div>
        <div class="circle-tile-number text-faded ">{{ $teams_count }}</div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6">
    <div class="circle-tile ">
      <a href="#"><div class="circle-tile-heading green"><i class="fa fa-lightbulb-o fa-fw fa-3x"></i></div></a>
      <div class="circle-tile-content green">
        <div class="circle-tile-description text-faded"> Total Projects </div>
        <div class="circle-tile-number text-faded ">{{ $projects_count }}</div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6">
    <div class="circle-tile ">
      <a href="{{route('browse.contests')}}"><div class="circle-tile-heading orange"><i class="fa fa-trophy fa-fw fa-3x"></i></div></a>
      <div class="circle-tile-content orange">
        <div class="circle-tile-description text-faded"> Total Contests </div>
        <div class="circle-tile-number text-faded ">{{ $contests_count }}</div>
      </div>
    </div>
  </div>
  <div class="col-lg-12 col-sm-6">

    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-trophy"></i> Contest Winners</div>
      <div class="card-body">
        @if($winners !== null)
          @foreach ($winners as $winner)
            <div class="jumbotron">
              <div class="container">
                <h4>Contest : {{ $winner['contest_name'] }}</h4>
                <p class="lead">Winning Team : {{ $winner['team_name'] }}</p>
                <p><span class="label label-success">Winner</span></p>
              </div>
            </div>
          @endforeach
        @else
          <div class="jumbotron">
            <div class="container">
              <p class="lead">No Winners Yet !</p>
            </div>
          </div>
        @endif
      </div>
      <div class="card-footer small text-muted">Thanks for participating !</div>
    </div>
  </div>
</div>
@endsection
