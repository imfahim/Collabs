@extends ('user.layouts.options')

@section('title', ' | Teams - Search Results')

@section('content')
<a href="{{ URL::previous() }}" class="btn btn-primary">Back</a><br><br>
@if(count($teams)==0)
No search Result
@endif
@foreach($teams as $us)
<div class="panel panel-default">
  <div class="panel-heading"><a href="{{route('team.details',[$us->id])}}">{{$us->name}}</a></div>
  <div class="panel-body">
    <label>{{$us->description}}</label><br>
    Leaded By- {{$us->leader_name}}
    <a href="{{route('project.invite',[$projectid,$us->id])}}" class="btn btn-warning pull-right">Invite to Project</a>
  </div>
</div>
@endforeach

@endsection
