@extends ('user.layouts.options')

@section('title', ' | Projects - Search Team')

@section('content')
<a href="{{ URL::previous() }}" class="btn btn-primary">Back</a><br><br>
<div class="container-fluid">
<form method="post">
  {{csrf_field()}}
<div class="form-group">
  <input type="text" class="form-control" name="search">
  <input type="hidden" name="project_id" value="{{$projectid}}"/>
</div>
<div class="form-group">
  <label class="control-label">Search By:</label>
  <select class="form-control" name="select" style="font-size:10px;">
    <option value="0">Name</option>
    <option value="1">Description</option>
  </select>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary btn-block">Search</button>
</div>

</form>

@endsection
