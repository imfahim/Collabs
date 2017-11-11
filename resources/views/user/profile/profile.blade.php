<!DOCTYPE html>
<html>
<head>
	<title>Profile - Company Manager</title>
</head>
<body>
	<table border="0" width="100%">
		<tr>
			<td width="100"></td>
			<td>
				<br/>
				<center>
				<h3>User Profile</h3>
				<?php  print_r($user); ?>

					@if(!isset($user->userId))
					<form method ="POST" action = "{{ route('profile.store') }}" >
					{{ csrf_field() }}
					<table>
					<tr>
							<td>Name: </td>
							<td>{{ $user->name}}</td>
					</tr>
					<tr>
							<td>EMAIL: </td>
							<td>{{ $user->email }}</td>
					</tr>
					<tr>
							<td>TYPE: </td>
							@if ($user->type == 0)
							<td>Developer</td>
							@else
							<td>Company</td>
							@endif
					</tr>
					<tr>
							<td>DATE OF BIRTH: </td>
									<td><input type="date" name="dOB"></td>
					</tr>
					<tr>
							<td>CITY: </td>
							<td><input type="text" name="city" value=""></td>
					</tr>
					<tr>
							<td>GENDER: </td>
									<td><select name="gender">
											<option value="1">MALE</option>
											<option value="2">FEMALE</option>
											<option value="3">OTHERS</option>
									</select></td>
					</tr>
					<tr>
							<td>CONTACT NO: </td>
							<td><input type="text" name="contactNo" value=""></td>
					</tr>
					<tr>
							<td>OCCUPATION: </td>
							<td><input type="text" name="occupation" value=""></td>
					</tr>
					<tr>
							<td>WEBSITE: </td>
							<td><input type="text" name="website" value=""></td>
					</tr>
					<tr>
							<td>ABOUT ME: </td>
							<td>
									<textarea name="aboutMe"></textarea>
							</td>
					</tr>
					<tr>
							<td>PAST EXPERIENCE: </td>
							<td><input type="text" name="pastExperience" value=""></td>
					</tr>
					<tr>
							<td>EDUCATION: </td>
							<td><input type="text" name="education" value=""></td>
					</tr>
					<tr>
							<td>PROGRAMMING EXPERIENCE: </td>
							<td><input type="text" name="programmingExperience" value=""></td>
					</tr>
					<tr>
							<td>PROJECTS: </td>
							<td><input type="text" name="projects" value=""></td>
					</tr>
					<tr>

							<td></td>

							<td></td>
					</tr>
					</table>
					<input type="submit" value="Update">
					</form>
					@else
					<form method ="POST" action = "{{ route('profile.update', [$user->id]) }}" >
					<input type="hidden" name="_method" value="put" />
					<input type="hidden" name="id" value="{{ $user->id }}" />
					{{ csrf_field() }}

					<table>
					<tr>
						<td>Name: </td>
						<td>{{ $user->name}}</td>
					</tr>
					<tr>
						<td>EMAIL: </td>
						<td>{{ $user->email }}</td>
					</tr>
					<tr>
						<td>TYPE: </td>
						@if ($user->type == 0)
						<td>Developer</td>
						@else
						<td>Company</td>
						@endif
					</tr>
					<tr>
						<td>DATE OF BIRTH: </td>
								<td>{{ $user->dateOfBirth}}</td>
					</tr>
					<tr>
						<td>CITY: </td>
						<td><input type="text" name="city" value="{{$user->city}}"></td>
					</tr>
					<tr>
						<td>GENDER: </td>
									@if($user->gender == 0)
									<td>Male</td>
									@elseif($user->gender == 1)
									<td>Female</td>
									@else
									<td>Others</td>
									@endif
					</tr>
					<tr>
						<td>CONTACT NO: </td>
						<td><input type="text" name="contactNo" value="{{$user->contactNo}}"></td>
					</tr>
					<tr>
						<td>OCCUPATION: </td>
						<td><input type="text" name="occupation" value="{{$user->occupation}}"></td>
					</tr>
					<tr>
						<td>WEBSITE: </td>
						<td><input type="text" name="website" value="{{$user->website}}"></td>
					</tr>
					<tr>
						<td>ABOUT ME: </td>
						<td>
								<textarea name="aboutMe">{{$user->aboutMe}}</textarea>
						</td>
					</tr>
					<tr>
						<td>PAST EXPERIENCE: </td>
						<td><input type="text" name="pastExperience" value="{{$user->pastExperience}}"></td>
					</tr>
					<tr>
						<td>EDUCATION: </td>
						<td><input type="text" name="education" value=""></td>
					</tr>
					<tr>
						<td>PROGRAMMING EXPERIENCE: </td>
						<td><input type="text" name="programmingExperience" value="{{$user->programmingExperience}}"></td>
					</tr>
					<tr>
						<td>PROJECTS: </td>
						<td><input type="text" name="projects" value="{{$user->projects}}"></td>
					</tr>
					<tr>

						<td></td>

						<td></td>
					</tr>
					</table>
					<input type="submit" value="Update">
					</form>
											@endif
					</center>
			</td>
			<td width="100"></td>
		</tr>
	</table>
</body>
</html>
