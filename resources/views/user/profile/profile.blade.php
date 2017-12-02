@extends ('user.layouts.options')

@section('title', ' | Developer Profile')

@section('content')
<a href="{{ route('user.pass.change') }}" class="btn btn-primary">Change Password</a>
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
									<td>
										<div class="input-group input-append date" id="birth_dateRangePicker">
												<input type="text" class="form-control" name="dOB" value="{{ old('dOB') }}" />
												<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
										</div>
									</td>
					</tr>
					<tr>
							<td style='width:20%; font-weight: bold;'>CITY: </td>
							<td><input type="text" class="form-control" name="city" value="{{ old('city') }}"></td>
					</tr>
					<tr>
							<td style='width:20%; font-weight: bold;'>GENDER: </td>
									<td><select class="form-control" style='font-size: 10px;'name="gender" value="{{ old('gender') }}">
											<option value="1">MALE</option>
											<option value="2">FEMALE</option>
											<option value="3">OTHERS</option>
									</select></td>
					</tr>
					<tr>
							<td style='width:20%; font-weight: bold;'>CONTACT NO: </td>
							<td><input type="text" class="form-control" name="contactNo" value="{{ old('contactNo') }}"></td>
					</tr>
					<tr>
							<td style='width:20%; font-weight: bold;'>OCCUPATION: </td>
							<td><input type="text" class="form-control" name="occupation" value="{{ old('occupation') }}"></td>
					</tr>
					<tr>
							<td style='width:20%; font-weight: bold;'>WEBSITE: </td>
							<td><input type="text" class="form-control" name="website" value="{{ old('website') }}"></td>
					</tr>
					<tr>
							<td style='width:20%; font-weight: bold;'>ABOUT ME: </td>
							<td>
									<textarea name="aboutMe" class="form-control" >{{ old('aboutMe') }}</textarea>
							</td>
					</tr>
					<tr>
							<td style='width:20%; font-weight: bold;'>PAST EXPERIENCE: </td>
							<td><input type="text" class="form-control" name="pastExperience" value="{{ old('pastExperience') }}"></td>
					</tr>
					<tr>
							<td style='width:20%; font-weight: bold;'>EDUCATION: </td>
							<td><input type="text" class="form-control" name="education" value="{{ old('education') }}"></td>
					</tr>
					<tr>
							<td style='width:20%; font-weight: bold;'>PROGRAMMING EXPERIENCE: </td>
							<td><input type="text" class="form-control" name="programmingExperience" value="{{ old('programmingExperience') }}"></td>
					</tr>
					<tr>
							<td style='width:20%; font-weight: bold;'>PROJECTS: </td>
							<td><input type="text" class="form-control" name="projects" value="{{ old('projects') }}"></td>
					</tr>
    			</table>
					<input type="submit" class="btn btn-warning" value="Update">


					</form>
@else
					<form method ="POST" action = "{{ route('profile.update', [$user->id]) }}" >
					<input type="hidden" name="_method" value="put" />
					<input type="hidden" name="id" value="{{ $user->id }}" />
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
								<td>{{ \Carbon\Carbon::parse($user->dateOfBirth)->format('d/m/Y') }}</td>
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

@section('page-scripts')
  <script>
  $(document).ready(function() {
      $('#birth_dateRangePicker')
          .datepicker({
              format: 'dd/mm/yyyy',
              startDate: '01/01/1990',
              endDate: '30/12/2020'
          })
          .on('changeDate', function(e) {
              // Revalidate the date field
              $('#dateRangeForm').formValidation('revalidateField', 'date');
          });
  });
  </script>
@endsection
