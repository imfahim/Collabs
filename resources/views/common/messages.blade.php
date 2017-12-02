@extends(session('is_user')? 'user.layouts.options' : 'company.layouts.options')
@section('title', ' | Messages')

@section('content')

@if(count($msg)==0)
No Conversation
@endif
@foreach($msg as $mm)
  @if($mm->user_id1==session('id'))
  <a href="{{route('messageOf',[$mm->user_id2])}}">
  <div class="card">
  <div class="card-body" >
  {{$mm->user_name2}}
  @else
  <a href="{{route('messageOf',[$mm->user_id1])}}">
  <div class="card">
  <div class="card-body" >
  {{$mm->user_name1}}
  @endif</div>
</div></a>
@endforeach
@endsection
