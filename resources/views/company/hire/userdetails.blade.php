@extends ('company.layouts.options')

@section('title', ' | Hires - User Detail')

@section('content')
@if(count($users)==0)
Unverified User!
@else
<a href="{{ URL::previous() }}" class="btn btn-primary">Back</a><br><br>
<div class="container">
  <table class="table table-striped">
    <tbody>
      <tr>
        <td style='width:20%; font-weight: bold;'>Name:</td>
        <td>{{$users->name}}</td>
      </tr>
      <tr>
        <td style='width:20%; font-weight: bold;'>E-mail:</td>
        <td>{{$users->email}}</td>
      </tr>
      <tr>
        <td style='width:20%; font-weight: bold;'>Date Of Birth:</td>
        <td>{{$users->dateOfBirth}}</td>
      </tr>
      <tr>
        <td style='width:20%; font-weight: bold;'>City:</td>
        <td>{{$users->city}}</td>
      </tr>
      <tr>
        <td style='width:20%; font-weight: bold;'>Contact No:</td>
        <td>{{$users->contactNo}}</td>
      </tr>
      <tr>
        <td style='width:20%; font-weight: bold;'>Occupation:</td>
        <td>{{$users->occupation}}</td>
      </tr>
      <tr>
        <td style='width:20%; font-weight: bold;'>About:</td>
        <td>{{$users->aboutMe}}</td>
      </tr>
      <tr>
        <td style='width:20%; font-weight: bold;'>Experiences:</td>
        <td>{{$users->pastExperience}}</td>
      </tr>
      <tr>
        <td style='width:20%; font-weight: bold;'>Education:</td>
        <td>{{$users->education}}</td>
      </tr>
      <tr>
        <td style='width:20%; font-weight: bold;'>Experties:</td>
        <td>{{$users->programmingExperience}}</td>
      </tr>
      <tr>
        <td style='width:20%; font-weight: bold;'>Projects:</td>
        <td>{{$users->projects}}</td>
      </tr>
      <tr>
        <td style='width:20%; font-weight: bold;'>Website:</td>
        <td><a href="{{$users->website}}">{{$users->website}}</a></td>
      </tr>
    </tbody>
  </table>

  <form method="POST" action="{{route('hire.invite')}}">
    {{ csrf_field() }}
    <input type="hidden" name="user_id" value="{{ $users->userId }}" />
    <div class="form-group">
 <label for="comment">Details:</label>
 <textarea class="form-control" rows="5" name="details"></textarea>
</div>
  <button type="submit" class="btn btn-primary">Hire</button><br><br>
</form>
@endif


@endsection
