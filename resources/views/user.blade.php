<!DOCTYPE html>
<html>
<head>
	<title>Home - User Manager</title>
</head>
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
			<td align="center">
				<a href="home.html">Home</a> |
				<a href="profile.html">Profile</a> |
				<a href="settings.html">Settings</a> |
				<a href="../login.html">Logout</a>
			</td>
			<td width="100"></td>
		</tr>
		<tr>
			<td width="100"></td>
			<td>
				<br/>
				<center>
          <h3>User Home</h3>
          <p>Welcome <strong>{{ $users->name}}</strong></p>
			</td>
			<td width="100"></td>
		</tr>
	</table>
</body>
</html>
