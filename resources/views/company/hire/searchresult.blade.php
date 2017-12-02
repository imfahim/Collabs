@extends ('company.layouts.options')

@section('title', ' | Hires - Search Result')

@section('content')
<a href="{{ URL::previous() }}" class="btn btn-primary">Back</a><br><br>
@if(count($users)==0)
No search Result
@endif
@foreach($users as $us)
<div class="panel panel-default">
  <div class="panel-heading"><a href="{{route('profile.view',[$us->id])}}">{{$us->name}}</a></div>
  <div class="panel-body">
    <label class="pull-left">{{$us->email}}</label>
    <a href="{{route('userdetails',[$us->id])}}" class="btn btn-warning pull-right">Details</a>
  </div>
</div>
@endforeach


@endsection
