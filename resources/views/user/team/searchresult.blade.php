@extends ('user.layouts.options')

@section('content')
<a href="{{ URL::previous() }}" class="btn btn-primary">Back</a><br><br>
@if(count($users)==0)
No search Result
@endif
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
