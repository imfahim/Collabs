@extends ('user.layouts.options')

@section('content')

<div class="container-fluid">
  <a href="{{ URL::previous() }}" class="btn btn-primary">Back</a><br><br>
  <div class="panel-group">
    <div class="panel panel-info">
        <div class="panel-heading">Create Team</div>
        <div class="panel-body">


          <form class="form-horizontal" method="post">
            {{csrf_field()}}
            <input type="hidden" name="leader_id" value="{{Session::get('id')}}" />
                 <div class="form-group">
                   <label class="control-label col-sm-2">Team Name:</label>
                   <div class="col-sm-10">
                     <input type="text" class="form-control" placeholder="Enter Team Name" name="team_name">
                   </div>
                 </div>
                 <div class="form-group">
                   <label class="control-label col-sm-2">Description:</label>
                   <div class="col-sm-10">
                     <textarea class="form-control" rows="5" placeholder="Team Description" name="description"></textarea>
                   </div>
                 </div>

                 <div class="form-group">
                   <label class="control-label col-sm-2">Total Member:</label>
                   <div class="col-sm-10">
                     <select class="form-control" name="total_member" style="font-size:10px;">
                       @for ($i = 1; $i < 51; $i++)
                           <option value="{{$i}}">{{$i}}</option>
                       @endfor
                     </select>

                   </div>
                 </div>

                 <div class="form-group">
                   <label class="col-sm-10 col-sm-offset-2">
                     @if($errors->any())
         						@foreach($errors->all() as $err)
         						<p>{{$err}}</p>
         						@endforeach
         						@endif
                  </label>
                 </div>
                 <div class="form-group">
                   <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary">Submit</button>
                   </div>
                 </div>
                </form>






        </div>
      </div>
  </div>
</div>
@endsection
