@extends ('user.layouts.options')

@section('title', ' | Teams - Requests')

@section('content')
<pre>
  <?php print_r($projects); ?>
</pre>
<a href="{{ URL::previous() }}" class="btn btn-primary">Back</a><br><br>
  @if($has!=0)
  @foreach($projects as $jin)
    <div class="panel panel-default">
      <div class="panel-heading">
      <div class="row">
        <div class="col-md-2" style="font-size:20px;">
          <a href="{{route('project.reqdetails',[$jin->project_id,$jin->team_id,$jin->leader_id])}}">{{$jin->name}}</a>
        </div>
      <div class="col-md-10">
      <a href="{{ route('project.decline', [$jin->team_project_id]) }}" class="btn btn-sm btn-danger pull-right">Decline</a>
      <a href="{{ route('project.accept', [$jin->team_project_id]) }}" class="btn btn-sm btn-warning pull-right">Accept</a>
    </div>
    </div>
  </div>
      <div class="panel-body">
          {{$jin->details}}<br>
      </div>
    </div>
  @endforeach
  {{ $projects->links() }}
  @else
  No Requests To Show
  @endif

@endsection
