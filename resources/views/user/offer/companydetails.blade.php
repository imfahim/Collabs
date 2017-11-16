@extends ('user.layouts.options')

@section('title', ' | Offers - Company Detail')

@section('content')
@if(count($company)==0)
No details to show
@else
<a href="{{ URL::previous() }}" class="btn btn-primary">Back</a><br><br>
<div class="container">
  <table class="table table-striped">
    <tbody>
      <tr>
        <td style='width:20%; font-weight: bold;'>Name:</td>
        <td>{{$company->name}}</td>
      </tr>
      <tr>
        <td style='width:20%; font-weight: bold;'>E-mail:</td>
        <td>{{$company->email}}</td>
      </tr>
      <tr>
        <td style='width:20%; font-weight: bold;'>City:</td>
        <td>{{$company->city}}</td>
      </tr>
      <tr>
        <td style='width:20%; font-weight: bold;'>Contact No:</td>
        <td>{{$company->contactNo}}</td>
      </tr>
      <tr>
        <td style='width:20%; font-weight: bold;'>About:</td>
        <td>{{$company->about}}</td>
      </tr>
      <tr>
        <td style='width:20%; font-weight: bold;'>Website:</td>
        <td><a href="{{$company->website}}">{{$company->website}}</a></td>
      </tr>
    </tbody>
  </table>

@endif




@endsection
