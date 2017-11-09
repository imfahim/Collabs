@extends ('user.layouts.options')

@section('content')
<div class="container-fluid">
  <a href="{{route('team.create')}}" class="btn btn-primary">Create your Team</a><br><br>
@foreach($jins as $jin)
@if($jin->status == 1)
    <div class="panel panel-default">
@else
  <div class="panel panel-info">
@endif
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
      @if ( $jin->leader_id  ==  Session::get('id') )
      <a href="{{ route('team.edit', [$jin->id]) }}" class="btn btn-sm btn-warning pull-right">Edit</a>
      @endif
    </div>
    </div>
  </div>
      <div class="panel-body">
          {{$jin->description}}<br>
          -Leaded By: {{$jin->leader_name}}
      </div>
    </div>
@endforeach
{{ $jins->links() }}
</div>
@endsection
