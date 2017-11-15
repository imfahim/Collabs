@extends ('user.layouts.options')

@section('content')
<div class="container-fluid">
  <a href="{{route('team.create')}}" class="btn btn-primary">Create your Team</a>
  <a href="{{route('team.requests')}}" class="btn btn-warning pull-right">
    ({{$rqsts}})
    Team Requests</a><br><br>
  <div class="row">
    <div class="col-md-6">
      My Team:
      @foreach($myteam as $jin)
      @if($jin->status == 1)
        <div class="panel panel-default">
      @else
      <div class="panel panel-info">
      @endif
          <div class="panel-heading">
          <div class="row">
            <div class="col-md-4" style="font-size:20px;">
              <a href="{{route('team.details',[$jin->id])}}">{{$jin->name}}</a>
            </div>
          <div class="col-md-8">
          Members({{$jin->existing_member}}/{{$jin->total_member}})
          @if($jin->status==1)
            (Disbanded)
          @endif
          <a href="{{ route('team.edit', [$jin->id]) }}" class="btn btn-sm btn-warning pull-right">Edit</a>
        </div>
        </div>
      </div>
          <div class="panel-body">
              {{$jin->description}}<br>
              -Leaded By: {{$jin->leader_name}}
          </div>
        </div>
      @endforeach
      {{ $myteam->links() }}

      </div>
  <div class="col-md-6">
    Joined Team:
    @foreach($joindteam as $jin)
    @if($jin->status == 1)
            <div class="panel panel-default">
        @else
          <div class="panel panel-info">
        @endif
              <div class="panel-heading">
                <div class="row">
                  <div class="col-md-4" style="font-size:20px;">
                  <a href="{{route('team.details',[$jin->id])}}">{{$jin->name}}</a>

                  </div>
                <div class="col-md-8">
              Members({{$jin->existing_member}}/{{$jin->total_member}})
              @if($jin->status==1)
                (Disbanded)
              @endif
              <a href="#" class="pull-right">Member</a>
              </div>
                </div>
              </div>
              <div class="panel-body">
                  {{$jin->description}}<br>
                  -Leaded By: {{$jin->leader_name}}
              </div>
            </div>
        @endforeach
        {{ $joindteam->links() }}

          </div>

  </div>

  </div>
</div>
@endsection
