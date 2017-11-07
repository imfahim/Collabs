<!DOCTYPE html>
<html>
<head>
	<title>Register - User Manager</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<body>
	<table border="0" width="100%">
		<tr>
			<td width="100"></td>
			<td align="center">
				<h1>User Manager</h1>
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
				<center>
				<h3>New User Registration</h3>
				<form method="post">
					{{csrf_field()}}
						<table>
							<tr>
								<td>FULL NAME: </td>
								<td><input type="text" name="name" value="{{ old('name') }}"></td>
							</tr>
							<tr>
								<td>EMAIL: </td>
								<td><input type="text" name="email" value="{{ old('email') }}"></td>
							</tr>
							<tr>
								<td>PASSWORD: </td>
								<td><input type="password" name="password"></td>
							</tr>
							<tr>
								<td>RE-PASSWORD: </td>
								<td><input type="password" name="repassword"></td>
							</tr>

              <tr>
								<td>User Type:</td>
								<td><select class="form-control" name="type">
                    <option value="0">Developer</option>
                    <option value="1">Company</option>
                  </select>
              </td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" value="Register"></td>
							</tr>
							<tr>
								<td></td>
								<td>
									<br/>
									Click <a href="{{route('login')}}">here</a> to login
								</td>
							</tr>
						</table>
					</form>
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
