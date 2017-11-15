@extends ('company.layouts.options')

@section('content')
<div class="panel panel-info">
		<div class="panel-heading"><center>Company Informations</center></div>
		<div class="panel-body">
							@if(!isset($company->companyId))
								<form method = "POST" action = "{{route('companyprofile.store')  }}" >
								{{ csrf_field() }}
								@if(isset($user->companyID))
								<input type="hidden" name="id" value="{{ $user->id }}" />
								<input type="hidden" name="_method" value="put" />
								@endif
								<table class="table table-striped">
									<tr>
										<td style='width:20%; font-weight: bold;'>Name: </td>
										<td>{{ $company->name}}</td>
									</tr>
									<tr>
										<td style='width:20%; font-weight: bold;'>EMAIL: </td>
										<td>{{ $company->email }}</td>
									</tr>
									<tr>
										<td style='width:20%; font-weight: bold;'>TYPE: </td>
										@if ($company->type == 0)
		    						<td>Developer</td>
										@else
		    						<td>Company</td>
										@endif
									</tr>

									<tr>
										<td style='width:20%; font-weight: bold;'>CITY: </td>
										<td><input type="text" class="form-control" name="city" value=""></td>
									</tr>

									<tr>
										<td style='width:20%; font-weight: bold;'>CONTACT NO: </td>
										<td><input type="text" class="form-control"  name="contactNo" value=""></td>
									</tr>

										<td style='width:20%; font-weight: bold;'>WEBSITE: </td>
										<td><input type="text" class="form-control"  name="website" value=""></td>
									</tr>
									<tr>
										<td style='width:20%; font-weight: bold;'>ABOUT: </td>
										<td>
											<textarea name="about" class="form-control" ></textarea>
										</td>
									</tr>
								</table>
								<input type="submit" class="btn btn-warning" value="Update">
							</form>
							@else
							<form method ="POST" action = "{{ route('companyprofile.update', [$company->id]) }}" >
							<input type="hidden" name="_method" value="put" />
							<input type="hidden" name="id" value="{{ $company->id }}" />
							{{ csrf_field() }}

															<table class="table table-striped">
																<tr>
																	<td style='width:20%; font-weight: bold;'>Name: </td>
																	<td>{{ $company->name}}</td>
																</tr>
																<tr>
																	<td style='width:20%; font-weight: bold;'>EMAIL: </td>
																	<td>{{ $company->email }}</td>
																</tr>
																<tr>
																	<td style='width:20%; font-weight: bold;'>TYPE: </td>
																	@if ($company->type == 0)
									    						<td>Developer</td>
																	@else
									    						<td>Company</td>
																	@endif
																</tr>

																<tr>
																	<td style='width:20%; font-weight: bold;'>CITY: </td>
																	<td><input type="text" class="form-control"  name="city" value="{{ $company->city }}"></td>
																</tr>

																<tr>
																	<td style='width:20%; font-weight: bold;'>CONTACT NO: </td>
																	<td><input type="text" class="form-control"  name="contactNo" value="{{ $company->contactNo }}"></td>
																</tr>

																	<td style='width:20%; font-weight: bold;'>WEBSITE: </td>
																	<td><input type="text" class="form-control"  name="website" value="{{  $company->website }}"></td>
																</tr>
																<tr>
																	<td style='width:20%; font-weight: bold;'>ABOUT: </td>
																	<td>
																		<textarea name="about" class="form-control" >{{ $company->about }}</textarea>
																	</td>
																</tr>

															</table>
															<input type="submit" class="btn btn-warning" value="Update">
														</form>
														@endif

			</td>
			<td width="100"></td>
		</tr>
	</table>
</div>
</div>
@endsection
