@extends ('company.layouts.options')

@section('title', ' | Hires - Invitations')

@section('content')
<a href="{{ URL::previous() }}" class="btn btn-primary">Back</a><br><br>
@if(count($users)==0)
No Invitations Sent Yet
@endif
@foreach($users as $us)
<div class="panel panel-default">
  <div class="panel-heading">{{$us->name}}
@if($us->accept==3)<label class="pull-right" style="color:red;">Declined</label>
@elseif($us->accept==1)<label class="pull-right" style="color:green;">Accepted</label>
@else<label class="pull-right" style="color:gold;">pending</label>
@endif
  </div>
  <div class="panel-body">
    <label>{{$us->email}}</label><br>
    <label>Message:</label>
    {{$us->details}}
  </div>
</div>
@endforeach

@endsection
