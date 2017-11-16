@extends ('user.layouts.options')

@section('title', ' | Teams - Search User')

@section('content')
<a href="{{ URL::previous() }}" class="btn btn-primary">Back</a><br><br>
<div class="container-fluid">
<form method="post">
  {{csrf_field()}}
<div class="form-group">
  <input type="text" class="form-control" name="search">
  <input type="hidden" name="team_id" value="{{$teamid}}"/>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary btn-block">Search</button>
</div>

</form>

@endsection
