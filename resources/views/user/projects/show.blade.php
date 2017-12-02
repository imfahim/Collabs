@extends ('user.layouts.options')

@section('title', ' | Projects - Show')

@section('content')

  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <div class="pull-left">
            <a href="{{ route('projects.index') }}"><button type="button" class="btn btn-primary">Back</button></a>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
            <p class="lead">
              <strong>Project Details :</strong>
            </p>
            <p class="lead">{{ $project->name }}</p>
            <p>{{ $project->details }}</p>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <p class="lead">
            <strong>Project Demo Details :</strong>
          </p>
          @if($extra)
            <p class="lead">
              Github Link :
            </p>
            <p>
              @if($extra->github !== '')
                <a href="{{ $extra->github }}" target="_blank" alt="#">Click Here</a> to check out !
              @else
                No github link given !
              @endif
            </p>
            <p class="lead">
              Youtube Link :
            </p>
            <p>
              @if($extra->youtube !== '')
                <a href="{{ $extra->youtube }}" target="_blank" alt="#">Click Here</a> to check out !
              @else
                No youtube link given !
              @endif
            </p>
          @else
            No Demo Info Given !
          @endif
        </div>
      </div>
    </div>
    <div class="col-md-4">

      @if($cteams->leader_id==session('id'))
      <div class="card">
        <div class="card-body">
          <div class="pull-left">
            <a href="{{route('project.searchteam',[$project->id])}}"><button type="button" class="btn btn-primary">Invite Team</button></a>
          </div>
        </div>
      </div>
      @endif



      <div class="card">
        <div class="card-body">
            <p class="lead">
              <strong>Created By :</strong>
            </p>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
            <p class="lead"><a href="{{route('team.details',[$cteams->id])}}">{{$cteams->name}}</a></p>
            <p>leaded by- {{$cteams->leader_name}}</p>
        </div>
      </div>
  @if(count($jteams)!=0)
    <div class="card">
      <div class="card-body">
          <p class="lead">
            <strong>Joined with :</strong>
          </p>
      </div>
    </div>
  @foreach($jteams as $team)
    <div class="card">
      <div class="card-body">
          <p class="lead"><a href="{{route('team.details',[$team->id])}}">{{$team->name}}</a></p>
          @if($team->leader_id==session('id'))
          <a href="{{route('project.leave',[$team->team_project_id,$team->leader_id])}}" class="btn btn-danger pull-right">Leave</a>
          @endif
          <p>leaded by- {{$team->leader_name}}</p>
      </div>
    </div>
  @endforeach
  @endif
    </div>
  </div>
@endsection
