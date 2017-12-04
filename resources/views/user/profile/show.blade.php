@extends ('user.layouts.options')

@section('title', ' | Developer Profile')

@section('content')
<div class="container-fluid">
  <div class="panel panel-default">
    <div class="panel-heading"><center><h4>{{session('username')}}</center></h4></div>
  </div>
  <div class="row">
    @if(!isset($nai))
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">Personal Information</div>
        <div class="panel-body">
          <table class="table">
            <tr>
            <th>About Me:</th>
            <td>{{$user->aboutMe}}</td>
            </tr>
            <tr>
            <th>About Me:</th>
            <td>{{$user->dateOfBirth}}&nbsp;({{$age}})</td>
            </tr>
            <tr>
            <th>Lives in:</th>
            <td>{{$user->city}}</td>
            </tr>
            <tr>
            <th>Occupation:</th>
            <td>{{$user->occupation}}</td>
            </tr>
            <tr>
            <th>Joined:</th>
            <td>{{$user->joined}}</td>
            </tr>
            <tr>
            <th>Gender:</th>
            @if($user->gender == 0)
            <td>Male</td>
            @elseif($user->gender == 1)
            <td>Female</td>
            @else
            <td>Others</td>
            @endif
            </tr>
            <tr>
            <th>Email:</th>
            <td>{{session('email')}}</td>
            </tr>
            <tr>
            <th>Website:</th>
            <td><a href="{{$user->website}}">{{$user->website}}</a></td>
            </tr>
            <th>Contact No:</th>
            <td>{{$user->contactNo}}</td>
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
            <td>{{$user->programming_language}}</td>
            </tr>
            <tr>
            <th>Architectures, Patters & Frameworks:</th>
            <td>{{$user->archi_patters}}</td>
            </tr>
            <tr>
            <th>Project Experience:</th>
            <td>{{$user->projects}}</td>
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
    @else
    Profile not created Yet!
    <a href="#" class="btn btn-primary">Create<a>
    @endif
  </div>
</div>

<!--modal maira de ekhane for EDIT CREATE er jnno alada page lagbe..validation shoho korbi -_- -->
@endsection
