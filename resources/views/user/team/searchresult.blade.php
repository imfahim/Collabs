@extends ('user.layouts.options')

@section('content')
@foreach($users as $us)
<div class="panel panel-default">
  <div class="panel-heading">{{$us->name}}</div>
  <div class="panel-body">
    <label class="pull-left">{{$us->email}}</label>
    <a href="{{route('team.invite',[$teamid,$us->id])}}" class="btn btn-warning pull-right">Invite to Team</a>
  </div>
</div>
@endforeach

@endsection
