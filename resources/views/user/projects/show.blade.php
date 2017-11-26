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
      @foreach($teams as $team)
      @if($team->leader_id==session('id'))
      <div class="card">
        <div class="card-body">
          <div class="pull-left">
            <a href="{{route('project.searchteam',[$project->id])}}"><button type="button" class="btn btn-primary">Invite Team</button></a>
          </div>
        </div>
      </div>
      @break
      @endif
      @endforeach


      <div class="card">
        <div class="card-body">
            <p class="lead">
              <strong>Managed By :</strong>
            </p>
        </div>
      </div>
    @foreach($teams as $team)
      <div class="card">
        <div class="card-body">
            <p class="lead"><a href="{{route('team.details',[$team->id])}}">{{$team->name}}</a></p>
            <p>leaded by- {{$team->leader_name}}</p>
        </div>
      </div>
    @endforeach
    </div>
  </div>
@endsection
