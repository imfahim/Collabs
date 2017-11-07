<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<table border="0" width="100%">
		<tr>
			<td width="100"></td>
			<td align="center">
				<h1>Login Page</h1>
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
				<h3>Login</h3>
					<form method="post" action="{{route('login.verify')}}">
						{{ csrf_field() }}
						<table>
							<tr>
								<td>Email: </td>
								<td><input type="text" name="Email"></td>
							</tr>
							<tr>
								<td>PASSWORD: </td>
								<td><input type="password" name="Pass"></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" value="Login"></td>
							</tr>
							<tr>
								<td></td>
								<td>
									<br/>
									Click <a href="{{route('register')}}">here</a> to register
								</td>
							</tr>
						</table>
					</form>
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
				</center>
			</td>
			<td width="100"></td>
		</tr>
	</table>
</body>
</html>
