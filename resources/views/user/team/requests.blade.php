@extends ('user.layouts.options')

@section('content')
<a href="{{ URL::previous() }}" class="btn btn-primary">Back</a><br><br>
  @if($has!=0)
  @foreach($teams as $jin)
    <div class="panel panel-default">
      <div class="panel-heading">
      <div class="row">
        <div class="col-md-2" style="font-size:20px;">
          <a href="{{route('team.details',[$jin->id])}}">{{$jin->name}}</a>
        </div>
      <div class="col-md-10">
      Members({{$jin->existing_member}}/{{$jin->total_member}})
      @if($jin->status==1)
        (Disbanded)
      @endif
      <a href="{{ route('team.decline', [$jin->id]) }}" class="btn btn-sm btn-danger pull-right">Decline</a>
      <a href="{{ route('team.accept', [$jin->id]) }}" class="btn btn-sm btn-warning pull-right">Accept</a>
    </div>
    </div>
  </div>
      <div class="panel-body">
          {{$jin->description}}<br>
          -Leaded By: {{$jin->leader_name}}
      </div>
    </div>
  @endforeach
  {{ $teams->links() }}
  @else
  No Requests To Show
  @endif

@endsection
