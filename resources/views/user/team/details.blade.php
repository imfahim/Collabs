@extends ('user.layouts.options')

@section('title', ' | Teams - Detail')

@section('content')
<div class="container-fluid">
  <a href="{{ URL::previous() }}" class="btn btn-primary">Back</a>
  <br />
  <br />
  <div class="row">
    <div class="col-md-6">
      @if($parbe==1)
      @if ($projects)
        <div class="card">
          <div class="card-body">
              <p class="lead">
                <strong>On Development Phase</strong>
              </p>
              @foreach ($projects as $project)
                @if ($project->status)
                  <div class="card">
                    <div class="card-body">
                        <p class="lead">
                          <i>{{ $project->name }}</i>
                        </p>
                        <p>{{ $project->details }}</p>
                        <div class="pull-right">
                          <a href="{{ route('projects.show', [$project->id]) }}" class="btn btn-sm btn-info">Project Details</a>
                        </div>
                    </div>
                  </div>
                @else
                  <div class="card">
                    <div class="card-body">
                        <p class="lead">
                          <i>No Projects Yet !</i>
                        </p>
                    </div>
                  </div>
                @endif
              @endforeach
          </div>
        </div>
        <div class="card">
          <div class="card-body">
              <p class="lead">
                <strong>Finished</strong>
              </p>
              @foreach ($projects as $project)
                @if (!$project->status)
                  <div class="card">
                    <div class="card-body">
                        <p class="lead">
                          <i>{{ $project->name }}</i>
                        </p>
                        <p>{{ $project->details }}</p>
                        <div class="pull-right">
                          <a href="{{ route('projects.show', [$project->id]) }}" class="btn btn-sm btn-info">Project Details</a>
                        </div>
                    </div>
                  </div>
                @else
                  <div class="card">
                    <div class="card-body">
                        <p class="lead">
                          <i>No Projects Yet !</i>
                        </p>
                    </div>
                  </div>
                @endif
              @endforeach
          </div>
        </div>
      @else
        <div class="card">
          <div class="card-body">
              <p class="lead">
                <strong>On Development Phase</strong>
              </p>
              <div class="card">
                <div class="card-body">
                    <p class="lead">
                      <i>No Projects Yet !</i>
                    </p>
                </div>
              </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
              <p class="lead">
                <strong>Finished</strong>
              </p>
              <div class="card">
                <div class="card-body">
                    <p class="lead">
                      <i>No Projects Yet !</i>
                    </p>
                </div>
              </div>
          </div>
        </div>
      @endif
      @endif
    </div>
    <div class="col-md-6">
      @if($leader->id == session('id'))
      <a href="{{route('team.searchuser',[$teamid])}}" class="btn btn-primary">Add User</a><br><br>
      @endif
      <div class="well well-sm border border-dark">Leader:</div>
      <div class="media">
        <div class="media-body">
          <h4 class="media-heading">{{$leader->name}}</h4>
          <p>{{$leader->email}}</p>
        </div>
      </div>
      <br>
      <div class="well well-sm border border-dark">Members:</div>
      @foreach($members as $mem)
      <div class="media">
        <div class="media-body">
          <h4 class="media-heading">{{$loop->iteration}}. {{$mem->name}}
          @if($mem->invite==0 && $leader->id==session('id'))
            (invited)
            <a href="{{route('team.reqcancel',[$teamid,$mem->id])}}" class="btn btn-danger pull-right">Cancel</a>
          @elseif($leader->id==session('id'))
          <a href="{{route('team.memremove',[$teamid,$mem->id])}}" class="btn btn-danger pull-right">Remove</a>
          @endif</h4>
          <p>{{$mem->email}}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
