@extends ('user.layouts.options')

@section('title', ' | Offers')

@section('content')
@if(count($offers)==0)
No Job Offers Yet
@endif
@foreach($offers as $us)
<div class="panel panel-default">
  <div class="panel-heading">
  @if($us->accept==0)
  <a href="{{route('offers.decline', [$us->offer_id]) }}" class="btn btn-sm btn-danger pull-right">Decline</a>
  <a href="{{ route('offers.accept', [$us->offer_id]) }}" class="btn btn-sm btn-warning pull-right">Accept</a>
  @elseif($us->accept==1)
  <label class="pull-right" style="color:green;">Accepted</label>
  @else
  <label class="pull-right" style="color:red;">Declined</label>
  @endif
  {{$us->name}}
  </div>
  <div class="panel-body">
    <label>Message:</label>
    {{$us->details}}<br>
  <a href="{{route('offers.companydetails', [$us->company_id]) }}" class="btn btn-sm btn-info">Company Details</a>
  </div>
</div>
@endforeach
@endsection
