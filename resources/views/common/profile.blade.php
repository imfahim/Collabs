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
<div class="container-fluid">
  <div class="panel panel-default">
    <div class="panel-heading"><center><h4>{{$profile->name}}</center></h4></div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">Personal Information</div>
        <div class="panel-body">
          <table class="table">
            <tr>
            <th>About Me:</th>
            <td>{{$profile->aboutMe}}</td>
            </tr>
            <tr>
            <th>About Me:</th>
            <td>{{$profile->dateOfBirth}}&nbsp;({{$age}})</td>
            </tr>
            <tr>
            <th>Lives in:</th>
            <td>{{$profile->city}}</td>
            </tr>
            <tr>
            <th>Occupation:</th>
            <td>{{$profile->occupation}}</td>
            </tr>
            <tr>
            <th>Joined:</th>
            <td>{{$profile->joined}}</td>
            </tr>
            <tr>
            <th>Gender:</th>
            @if($profile->gender == 0)
            <td>Male</td>
            @elseif($profile->gender == 1)
            <td>Female</td>
            @else
            <td>Others</td>
            @endif
            </tr>
            <tr>
            <th>Email:</th>
            <td>{{$profile->email}}</td>
            </tr>
            <tr>
            <th>Website:</th>
            <td><a href="{{$profile->website}}">{{$profile->website}}</a></td>
            </tr>
            <th>Contact No:</th>
            <td>{{$profile->contactNo}}</td>
            </tr>
            <tr>

          </table>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">Skills</div>
        <div class="panel-body">
          <table class="table">
            <tr>
            <th>Programming Languages:</th>
            <td>{{$profile->programming_language}}</td>
            </tr>
            <tr>
            <th>Architectures, Patters & Frameworks:</th>
            <td>{{$profile->archi_patters}}</td>
            </tr>
            <tr>
            <th>Project Experience:</th>
            <td>{{$profile->projects}}</td>
            </tr>
            <tr>
            <th>Completed Project:</th>
            <td>{{$done}}</td>
            </tr>
          </table>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">Education and Employement</div>
        <div class="panel-body">
          <div class="well well-sm">Education:</div>
          <div class="row">
          @foreach($edu as $ed)
          <div class="col-md-6">
            <label>{{$ed->institution_name}}</label>
            <p style="font-size:14px;">{{$ed->department}}</p>
            <p style="font-size:11px;">({{$ed->start}})-({{$ed->end}})</p>
          </div>
          @endforeach
        </div>
          <div class="well well-sm">Employement:</div>
          <div class="row">
          @foreach($job as $ed)
          <div class="col-md-6">
            <label>{{$ed->institution_name}}</label>
            <p style="font-size:14px;">{{$ed->department}}</p>
            <p style="font-size:11px;">({{$ed->start}})-({{$ed->end}})</p>
          </div>
          @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
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
