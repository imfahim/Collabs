@extends ('company.layouts.options')

@section('title', ' | Hires')

@section('content')
<a href="{{route('invitations')}}" class="btn btn-warning">All Invitations</a><br><br>


<div class="container-fluid">
<form method="post">
  {{csrf_field()}}
<div class="form-group">
  <input type="text" class="form-control" name="search">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary btn-block">Search User</button>
</div>

</form>

@endsection
