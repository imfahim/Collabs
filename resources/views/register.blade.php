<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
	<table border="0" width="100%">
		<tr>
			<td width="100"></td>
			<td align="center">
				<h1>Registration</h1>
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
				<form method="post">
					{{csrf_field()}}
						<table>
							<tr>
								<td></td>
								<td>
									<div class="input-group">
								    <span class="input-group-addon"><label style="margin-right:29px">Name:</label></span>
								    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
								  </div>
							</tr>
							<tr>
								<td></td>
								<td>
									<div class="input-group">
								    <span class="input-group-addon"><label style="margin-right:29px">Email:</label></span>
								    <input type="text" class="form-control" name="email" value="{{ old('email') }}">
								  </div>
							</tr>
							<tr>
								<td></td>
								<td>
									<div class="input-group">
								    <span class="input-group-addon"><label>Password:</label></span>
								    <input type="password" class="form-control" name="password">
								  </div>
							</tr>
							<tr>
								<td></td>
								<td>
									<div class="input-group">
								    <span class="input-group-addon"><label style="font-size:11px">Re-Password</label></span>
								    <input type="password" class="form-control" name="repassword">
								  </div>
							</tr>

              <tr>
								<td></td>
								<td>
									<div class="input-group">
								    <span class="input-group-addon"><label>User Type:</label></span>
										<select class="form-control" name="type">
	                    <option value="0">Developer</option>
	                    <option value="1">Company</option>
	                  </select>
								  </div>

              </td>
							</tr>
							<tr>
								<td></td>
								<td><br><center><input type="submit" class="btn btn-success" value="Register"></center></td>
							</tr>
							<tr>
								<td></td>
								<td>
									<br><label style="margin-left:10px">Already A Member? Click <a href="{{route('login')}}">here</a> to login</label>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
					<br/>
					<br/>
					<label>
						@if($errors->any())
						@foreach($errors->all() as $err)
						<p>{{$err}}</p>
						@endforeach
						@endif
					</label>
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
