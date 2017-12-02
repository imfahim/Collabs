@extends(session('is_user')? 'user.layouts.options' : 'company.layouts.options')
@section('title', ' | Profile - Detail')

@section('content')
<a href="{{ URL::previous() }}" class="btn btn-primary">Back</a>
@if(!isset($profile->userId) && !isset($profile->companyId))
<br>Not a Verfied User
@else
@if(isset($profile->userId) && $profile->userId!=session('id') )
<a href="{{route('messageOf',[$profile->userId])}}" class="btn btn-info pull-right">Send Message</a><br><br>
@elseif(isset($profile->companyId) && $profile->companyId!=session('id') )
<a href="{{route('messageOf',[$profile->companyId])}}" class="btn btn-info pull-right">Send Message</a><br><br>
@endif

@if($profile->type==0)
<table class="table table-striped">
<tr>
  <td style='width:20%; font-weight: bold;'>Name: </td>
  <td>{{ $profile->name}}</td>
</tr>
<tr>
  <td style='width:20%; font-weight: bold;'>EMAIL: </td>
  <td>{{ $profile->email}}</td>
</tr>
<tr>
  <td style='width:20%; font-weight: bold;'>TYPE: </td>
  <td>Developer</td>
</tr>
<tr>
  <td style='width:20%; font-weight: bold;'>DATE OF BIRTH: </td>
      <td>{{ \Carbon\Carbon::parse($profile->dateOfBirth)->format('d/m/Y') }}</td>
</tr>
<tr>
  <td style='width:20%; font-weight: bold;'>CITY: </td>
  <td>{{$profile->city}}></td>
</tr>
<tr>
  <td style='width:20%; font-weight: bold;'>GENDER: </td>
        @if($profile->gender == 0)
        <td>Male</td>
        @elseif($profile->gender == 1)
        <td>Female</td>
        @else
        <td>Others</td>
        @endif
</tr>
<tr>
  <td style='width:20%; font-weight: bold;'>CONTACT NO: </td>
  <td>{{$profile->contactNo}}</td>
</tr>
<tr>
  <td style='width:20%; font-weight: bold;'>OCCUPATION: </td>
  <td>{{$profile->occupation}}</td>
</tr>
<tr>
  <td style='width:20%; font-weight: bold;'>WEBSITE: </td>
  <td><a href="{{$profile->website}}">{{$profile->website}}</a></td>
</tr>
<tr>
  <td style='width:20%; font-weight: bold;'>ABOUT ME: </td>
  <td>
      <textarea name="aboutMe" readonly>{{$profile->aboutMe}}</textarea>
  </td>
</tr>
<tr>
  <td style='width:20%; font-weight: bold;'>PAST EXPERIENCE: </td>
  <td>{{$profile->pastExperience}}</td>
</tr>
<tr>
  <td style='width:20%; font-weight: bold;'>EDUCATION: </td>
  <td>{{$profile->education}}</td>
</tr>
<tr>
  <td style='width:20%; font-weight: bold;'>PROGRAMMING EXPERIENCE: </td>
  <td>{{$profile->programmingExperience}}</td>
</tr>
<tr>
  <td style='width:20%; font-weight: bold;'>PROJECTS: </td>
  <td>{{$profile->projects}}</td>
</tr>

</table>
@else
<table class="table table-striped">
  <tr>
    <td style='width:20%; font-weight: bold;'>Name: </td>
    <td>{{ $profile->name}}</td>
  </tr>
  <tr>
    <td style='width:20%; font-weight: bold;'>EMAIL: </td>
    <td>{{ $profile->email }}</td>
  </tr>
  <tr>
    <td style='width:20%; font-weight: bold;'>TYPE: </td>
    <td>Company</td>

  </tr>

  <tr>
    <td style='width:20%; font-weight: bold;'>CITY: </td>
    <td>{{$profile->city}}</td>
  </tr>

  <tr>
    <td style='width:20%; font-weight: bold;'>CONTACT NO: </td>
    <td>{{$profile->contactNo}}</td>
  </tr>

    <td style='width:20%; font-weight: bold;'>WEBSITE: </td>
    <td><a href="{{$profile->website}}">{{$profile->website}}</a></td>
  </tr>
  <tr>
    <td style='width:20%; font-weight: bold;'>ABOUT: </td>
    <td>
      <textarea name="about" class="form-control" readonly>{{$profile->about}}</textarea>
    </td>
  </tr>
</table>
@endif
@endif
@endsection
