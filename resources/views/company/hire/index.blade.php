@extends ('company.layouts.options')

@section('content')
<a href="{{ URL::previous() }}" class="btn btn-primary pull-right">Back</a><br><br>

<a href="#" class="btn btn-warning">All Invitations</a>

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
