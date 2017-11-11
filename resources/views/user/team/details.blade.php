@extends ('user.layouts.options')

@section('content')
<div class="container-fluid">
  <a href="{{route('team')}}" class="btn btn-primary">Back</a>
  <div class="row">
    <div class="col-md-6">
      project portions
    </div>
    <div class="col-md-6">
      @if($leader->id == session('id'))
      <a href="{{route('team.searchuser',[$teamid])}}" class="btn btn-primary">Add User</a><br><br>
      @endif
      <div class="well well-sm">Leader:</div>
      <div class="media">
        <div class="media-body">
          <h4 class="media-heading">{{$leader->name}}</h4>
          <p>{{$leader->email}}</p>
        </div>
      </div>
      <br>
      <div class="well well-sm">Members:</div>
      @foreach($members as $mem)
      <div class="media">
        <div class="media-body">
          <h4 class="media-heading">{{$loop->iteration}}. {{$mem->name}}
          @if($mem->invite==0)
            (invited)
            <a href="{{route('team.reqcancel',[$teamid,$mem->id])}}" class="btn btn-danger pull-right">Cancel</a>
          @else
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
