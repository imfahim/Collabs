<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
	<table border="0" width="100%">
		<tr>
			<td width="100"></td>
			<td align="center">
				<h1>Login</h1>
			</td>
			<td width="100"></td>
		</tr>
		<tr>
			<td width="100"></td>
			<td align="center">
				<hr/>
			</td>
			<td width="100"></td>
		</tr>
		<tr>
			<td width="100"></td>
			<td>
				<br/>
				<br>
				<center>
					<div class="panel panel-default" style="background-color:#343A40;"><br><br>
	  <div class="panel-body">
					<form method="post" action="{{route('login.verify')}}">
						{{ csrf_field() }}
						<table>
							<tr>
								<td></td>
								<td>
									<div class="input-group">
								    <span class="input-group-addon"><label style="margin-right:29px">Email:</label></span>
								    <input type="text" class="form-control" name="Email" placeholder="Email">
								  </div>
							</tr>
							<tr>
								<td></td>
								<td>
									<div class="input-group">
									<span class="input-group-addon"><label>Password:</label></span>
									<input type="password" class="form-control" name="Pass" placeholder="Password">
								</div>
							</tr>
							<tr>
								<td></td>
								<td><br><center><input type="submit" class="btn btn-success" value="Login"></center></td>
							</tr>
							<tr>
								<td></td>
								<td>
									<br><label style="margin-left:10px">Not A Member? Click <a href="{{route('register')}}">here</a> to register</label>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
					<br/>
					<br/>
					<div>
						@if(Session::has('success'))
							<p style="color: green;">{{ Session::get('success') }}</p>
						@endif
						@if(Session::has('fail'))
							<p style="color: red;">{{ Session::get('fail') }}</p>
						@endif
					</div>
					<div>
						@if($errors->any())
						@foreach($errors->all() as $err)
						<p>Error: {{$err}}</p>
						@endforeach
						@endif
					</div>
				</center>
			</td>
			<td width="100"></td>
		</tr>
	</table>
</body>
</html>
<style>
body{
	background-color:#343A40;
	color:white;
}
</style>
