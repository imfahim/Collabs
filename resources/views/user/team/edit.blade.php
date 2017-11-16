@extends ('user.layouts.options')

@section('title', ' | Teams - Edit')

@section('content')
<div class="container-fluid">
  <a href="{{ URL::previous() }}" class="btn btn-primary">Back</a><br><br>
  <div class="panel-group">
    <div class="panel panel-info">
        <div class="panel-heading">EditTeam</div>
        <div class="panel-body">
          <form class="form-horizontal" method="post" action="{{ route('team.update', [$team->id]) }}">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$team->id}}"/>
            <input type="hidden" name="old_name" value="{{$team->name}}"/>
            <input type="hidden" name="leader_id" value="{{Session::get('id')}}"/>
                 <div class="form-group">
                   <label class="control-label col-sm-2">Team Name:</label>
                   <div class="col-sm-10">
                     <input type="text" class="form-control" value="{{$team->name}}" name="team_name">
                   </div>
                 </div>
                 <div class="form-group">
                   <label class="control-label col-sm-2">Description:</label>
                   <div class="col-sm-10">
                     <textarea class="form-control" rows="5" name="description">{{$team->description}}</textarea>
                   </div>
                 </div>

                 <div class="form-group">
                   <label class="control-label col-sm-2">Total Member:</label>
                   <div class="col-sm-10">
                     <select class="form-control" name="total_member" style="font-size:10px;">
                       @for ($i = $team->existing_member; $i < 51; $i++)
                           <option value="{{$i}}" {{ ($i == $team->total_member) ? ' selected="selected"' : '' }}>{{$i}}</option>
                       @endfor
                     </select>

                   </div>
                 </div>
                 <div class="form-group">
                         <label class="control-label col-sm-2">Status</label>
                         <div class="col-sm-10">
                         <select name="status" class="form-control" style="font-size:10px;">
                           <option value="0" {{ ($team->status === 0) ? 'selected' : '' }}>Enable</option>
                           <option value="1" {{ ($team->status === 1) ? 'selected' : '' }}>Disband</option>
                         </select>
                       </div>
                 </div>
                 <div class="form-group">
                         <label class="control-label col-sm-2">Last Updated:</label>
                         <div class="col-sm-10">
                         {{$team->updated_at}}
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
