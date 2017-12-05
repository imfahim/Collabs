@extends ('user.layouts.options')

@section('title', ' | Developer Profile')

@section('content')
<div class="container-fluid">
  <div class="panel panel-default">
    <div class="panel-heading"><center><h4>{{session('username')}}</center></h4>

    </div>
  </div>
  <form method = "POST" action = "{{ route('profile.store') }}">
    {{ csrf_field() }}
  <div class="row">
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-body">
        <div class="pull-left">
          <button type="submit" class="btn btn-success">Create Profile Info</button>
        </div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">Personal Information

        </div>
        <div class="panel-body">
          <table class="table">
            <tr>
            <th>About Me:</th>
            <td><textarea name="aboutMe">{{ old('aboutMe') }}</textarea></td>
            </tr>
            <tr>
            <th>Date of Birth:</th>
            <td><input type="date" name="dOB" value="{{old('dateOfBirth')}}" /></td>
            </tr>
            <tr>
            <th>Lives in:</th>
            <td><input type="text" name="city" value="{{old('city')}}" /></td>
            </tr>
            <tr>
            <th>Occupation:</th>
            <td><input type="text" name="occupation" value="{{old('occupation')}}" /></td>
            </tr>
            <tr>
            <th>Gender:</th>
            <td>
              <select class="form-control" style='font-size: 10px;' name="gender">
                <option value="1">Female</option>
                <option value="2">Male</option>
              </select>
            </td>
            </tr>
            <tr>
            <th>Email:</th>
            <td>{{session('email')}}</td>
            </tr>
            <tr>
            <th>Website:</th>
            <td><input type="text" name="website" value="{{old('website')}}" /></td>
            </tr>
            <th>Contact No:</th>
            <td><input type="text" name="contactNo" value="{{old('contactNo')}}" /></td>
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
            <th>Programming Languages: (seperate with comma)</th>
            <td><input type="text" name="programing_languages" value="{{old('programming_language')}}" /></td>
            </tr>
            <tr>
            <th>Architectures, Patters & Frameworks:</th>
            <td><input type="text" name="archi" value="" /></td>
            </tr>
            <tr>
            <th>Project Experience:</th>
            <td><input type="text" name="projects" value="" /></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</form>
</div>

<!--modal maira de ekhane for EDIT CREATE er jnno alada page lagbe..validation shoho korbi -_- -->
@endsection
