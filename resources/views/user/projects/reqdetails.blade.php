@extends ('user.layouts.options')

@section('title', ' | Projects - Requests details')

@section('content')
<a href="{{ URL::previous() }}" class="btn btn-primary">Back</a><br><br>
<label>Project Name: </label>{{$project->name}}<br>
<label>Managed By:</label>
@foreach($teams as $us)
<div class="panel panel-default">
  <div class="panel-heading"><a href="{{route('team.details',[$us->id])}}">{{$us->name}}</a></div>
  <div class="panel-body">
    <label>{{$us->description}}</label><br>
    Leaded By- {{$us->leader_name}}
  </div>
</div>
@endforeach

@endsection
