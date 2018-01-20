@extends ('user.layouts.options')

@section('title', ' | Teams - Search Results')

@section('content')
<a href="{{ URL::previous() }}" class="btn btn-primary">Back</a><br><br>
@if(count($users)==0)
No search Result
@endif
@foreach($users as $us)
<div class="panel panel-default">
  <div class="panel-heading"><a href="{{route('profileof.view',[$us->id])}}">{{$us->name}}</a></div>
  <div class="panel-body">
    <label class="pull-left">{{$us->email}}</label>
    <a href="{{route('team.invite',[$teamid,$us->id])}}" class="btn btn-warning pull-right">Invite to Team</a>
  </div>
</div>
@endforeach

@endsection
