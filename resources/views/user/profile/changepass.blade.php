@extends ('user.layouts.options')

@section('title', ' | Developer Profile')

@section('content')
<a href="{{ URL::previous() }}" class="btn btn-primary">Back</a><br><br>

<div class="panel panel-info">
		<div class="panel-heading"><center>Change Password</center></div>
		<div class="panel-body">
					<form method ="POST" >
					{{ csrf_field() }}
          <input type="hidden" name="id" value="{{ Session::get('id') }}">
          <label>New Password</label>
          <input type="password" name="pass" />
          <br>
          <label>Confirm Password</label>
          <input type="password" name="conpass" />
          <input type="submit" name="change" />
          </form>
</div>
</div>
@endsection
