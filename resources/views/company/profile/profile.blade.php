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
				<h3>Company Profile</h3>
				<?php print_r($company); ?>
							@if(!isset($company->companyId))
								<form method = "POST" action = "{{route('companyprofile.store')  }}" >
								{{ csrf_field() }}
								@if(isset($user->companyID))
								<input type="hidden" name="id" value="{{ $user->id }}" />
								<input type="hidden" name="_method" value="put" />
								@endif
								<table>
									<tr>
										<td>Name: </td>
										<td>{{ $company->name}}</td>
									</tr>
									<tr>
										<td>EMAIL: </td>
										<td>{{ $company->email }}</td>
									</tr>
									<tr>
										<td>TYPE: </td>
										@if ($company->type == 0)
		    						<td>Developer</td>
										@else
		    						<td>Company</td>
										@endif
									</tr>

									<tr>
										<td>CITY: </td>
										<td><input type="text" name="city" value=""></td>
									</tr>

									<tr>
										<td>CONTACT NO: </td>
										<td><input type="text" name="contactNo" value=""></td>
									</tr>

										<td>WEBSITE: </td>
										<td><input type="text" name="website" value=""></td>
									</tr>
									<tr>
										<td>ABOUT: </td>
										<td>
											<textarea name="about"></textarea>
										</td>
									</tr>

										<td></td>

										<td></td>
									</tr>
								</table>
								<input type="submit" value="Update">
							</form>
							@else
							<form method ="POST" action = "{{ route('companyprofile.update', [$company->id]) }}" >
							<input type="hidden" name="_method" value="put" />
							<input type="hidden" name="id" value="{{ $company->id }}" />
							{{ csrf_field() }}

															<table>
																<tr>
																	<td>Name: </td>
																	<td>{{ $company->name}}</td>
																</tr>
																<tr>
																	<td>EMAIL: </td>
																	<td>{{ $company->email }}</td>
																</tr>
																<tr>
																	<td>TYPE: </td>
																	@if ($company->type == 0)
									    						<td>Developer</td>
																	@else
									    						<td>Company</td>
																	@endif
																</tr>

																<tr>
																	<td>CITY: </td>
																	<td><input type="text" name="city" value="{{ $company->city }}"></td>
																</tr>

																<tr>
																	<td>CONTACT NO: </td>
																	<td><input type="text" name="contactNo" value="{{ $company->contactNo }}"></td>
																</tr>

																	<td>WEBSITE: </td>
																	<td><input type="text" name="website" value="{{  $company->website }}"></td>
																</tr>
																<tr>
																	<td>ABOUT: </td>
																	<td>
																		<textarea name="about">{{ $company->about }}</textarea>
																	</td>
																</tr>

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
