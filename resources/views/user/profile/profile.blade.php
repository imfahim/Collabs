@extends ('user.layouts.options')

@section('content')
<div class="panel panel-info">
		<div class="panel-heading"><center>Profile</center></div>
		<div class="panel-body">
@if(!isset($user->userId))
					<form method ="POST" action = "{{ route('profile.store') }}" >
					{{ csrf_field() }}
					<table class="table table-striped">
					<tr>
							<td style='width:20%; font-weight: bold;'>Name: </td>
							<td>{{ $user->name}}</td>
					</tr>
					<tr>
							<td style='width:20%; font-weight: bold;'>EMAIL: </td>
							<td>{{ $user->email }}</td>
					</tr>
					<tr>
							<td style='width:20%; font-weight: bold;'>TYPE: </td>
							@if ($user->type == 0)
							<td>Developer</td>
							@else
							<td>Company</td>
							@endif
					</tr>
					<tr>
							<td style='width:20%; font-weight: bold;'>DATE OF BIRTH: </td>
									<td><input type="date" name="dOB"></td>
					</tr>
					<tr>
							<td style='width:20%; font-weight: bold;'>CITY: </td>
							<td><input type="text" class="form-control" name="city" value=""></td>
					</tr>
					<tr>
							<td style='width:20%; font-weight: bold;'>GENDER: </td>
									<td><select class="form-control" style='font-size: 10px;'name="gender">
											<option value="1">MALE</option>
											<option value="2">FEMALE</option>
											<option value="3">OTHERS</option>
									</select></td>
					</tr>
					<tr>
							<td style='width:20%; font-weight: bold;'>CONTACT NO: </td>
							<td><input type="text" class="form-control" name="contactNo" value=""></td>
					</tr>
					<tr>
							<td style='width:20%; font-weight: bold;'>OCCUPATION: </td>
							<td><input type="text" class="form-control" name="occupation" value=""></td>
					</tr>
					<tr>
							<td style='width:20%; font-weight: bold;'>WEBSITE: </td>
							<td><input type="text" class="form-control" name="website" value=""></td>
					</tr>
					<tr>
							<td style='width:20%; font-weight: bold;'>ABOUT ME: </td>
							<td>
									<textarea name="aboutMe" class="form-control" ></textarea>
							</td>
					</tr>
					<tr>
							<td style='width:20%; font-weight: bold;'>PAST EXPERIENCE: </td>
							<td><input type="text" class="form-control" name="pastExperience" value=""></td>
					</tr>
					<tr>
							<td style='width:20%; font-weight: bold;'>EDUCATION: </td>
							<td><input type="text" class="form-control" name="education" value=""></td>
					</tr>
					<tr>
							<td style='width:20%; font-weight: bold;'>PROGRAMMING EXPERIENCE: </td>
							<td><input type="text" class="form-control" name="programmingExperience" value=""></td>
					</tr>
					<tr>
							<td style='width:20%; font-weight: bold;'>PROJECTS: </td>
							<td><input type="text" class="form-control" name="projects" value=""></td>
					</tr>
    			</table>
					<input type="submit" class="btn btn-warning" value="Update">


					</form>
@else
					<form method ="POST" action = "{{ route('profile.update', [$user->id]) }}" >
					<input type="hidden" name="_method" value="put" />
					<input type="hidden" name="id" value="{{ $user->id }}" />
					{{ csrf_field() }}

					<table>
					<tr>
						<td style='width:20%; font-weight: bold;'>Name: </td>
						<td>{{ $user->name}}</td>
					</tr>
					<tr>
						<td style='width:20%; font-weight: bold;'>EMAIL: </td>
						<td>{{ $user->email }}</td>
					</tr>
					<tr>
						<td style='width:20%; font-weight: bold;'>TYPE: </td>
						@if ($user->type == 0)
						<td>Developer</td>
						@else
						<td>Company</td>
						@endif
					</tr>
					<tr>
						<td style='width:20%; font-weight: bold;'>DATE OF BIRTH: </td>
								<td>{{ $user->dateOfBirth}}</td>
					</tr>
					<tr>
						<td style='width:20%; font-weight: bold;'>CITY: </td>
						<td><input type="text" class="form-control" name="city" value="{{$user->city}}"></td>
					</tr>
					<tr>
						<td style='width:20%; font-weight: bold;'>GENDER: </td>
									@if($user->gender == 0)
									<td>Male</td>
									@elseif($user->gender == 1)
									<td>Female</td>
									@else
									<td>Others</td>
									@endif
					</tr>
					<tr>
						<td style='width:20%; font-weight: bold;'>CONTACT NO: </td>
						<td><input type="text" class="form-control" name="contactNo" value="{{$user->contactNo}}"></td>
					</tr>
					<tr>
						<td style='width:20%; font-weight: bold;'>OCCUPATION: </td>
						<td><input type="text" class="form-control" name="occupation" value="{{$user->occupation}}"></td>
					</tr>
					<tr>
						<td style='width:20%; font-weight: bold;'>WEBSITE: </td>
						<td><input type="text" class="form-control" name="website" value="{{$user->website}}"></td>
					</tr>
					<tr>
						<td style='width:20%; font-weight: bold;'>ABOUT ME: </td>
						<td>
								<textarea name="aboutMe">{{$user->aboutMe}}</textarea>
						</td>
					</tr>
					<tr>
						<td style='width:20%; font-weight: bold;'>PAST EXPERIENCE: </td>
						<td><input type="text" class="form-control" name="pastExperience" value="{{$user->pastExperience}}"></td>
					</tr>
					<tr>
						<td style='width:20%; font-weight: bold;'>EDUCATION: </td>
						<td><input type="text" class="form-control" name="education" value=""></td>
					</tr>
					<tr>
						<td style='width:20%; font-weight: bold;'>PROGRAMMING EXPERIENCE: </td>
						<td><input type="text" class="form-control" name="programmingExperience" value="{{$user->programmingExperience}}"></td>
					</tr>
					<tr>
						<td style='width:20%; font-weight: bold;'>PROJECTS: </td>
						<td><input type="text" class="form-control" name="projects" value="{{$user->projects}}"></td>
					</tr>

					</table>
					<input type="submit" class="btn btn-warning" value="Update">
					</form>
@endif
			</td>
		</tr>
	</table>
</div>
</div>
@endsection
