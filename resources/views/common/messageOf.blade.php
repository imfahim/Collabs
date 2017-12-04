@extends(session('is_user')? 'user.layouts.options' : 'company.layouts.options')
@section('title', ' | Message - of')

@section('content')

  <div class="card-body my">
    <a href="{{ route('message') }}" class="btn btn-primary">Back</a><br><br>
    <div class="panel panel-default">
  <div class="panel-heading">
    <p class="lead">
      <strong> <a href="{{route('profileof.view',[$name->id])}}">{{$name->name}}</a></strong>
    </p>
  </div>
  <div class="panel-body">

      @if(count($msg)==0)
      No Messages Yet
      @else
      <div class="row">
      <div class="col-md-12">
      <div class="panel panel-default" style="max-height:180px;overflow-y:auto">
        <div class="panel-body">
          @foreach($msg as $mm)
          <div class="media">
              @if($mm->from_id==session('id'))
              <div class="media-body" style="text-align: right;">
                <h4 class="media-heading"><small><i>{{$mm->time}}</i></small></h4>
                <p style="background-color:#4080FF;display: inline;padding: 3px 15px;border-radius: 25px;color:white;word-wrap: break-word;">{{$mm->messages}}</p>
              </div>
              @else
              <div class="media-body" style="text-align: left;">
                <h4 class="media-heading"><small><i>{{$mm->time}}</i></small></h4>
                <p style="background-color:#F1F0F0;display: inline;padding: 3px 15px;border-radius: 25px;word-wrap: break-word;">{{$mm->messages}}</p>
              </div>
              @endif
              </div>
          @endforeach
      </div>
    </div>

    </div>
    </div>

  @endif
  <div class="col-md-12">
      <form method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="toid" value="{{ $uid }}" />
        <input type="hidden" name="toname" value="{{$name->name}}" />

        <div class="form-group">
     <label for="comment">Message:</label>
     <textarea class="form-control" rows="5" name="msg"></textarea>
    </div>
      <button type="submit" class="btn btn-primary">send</button><br><br>
    </form>

</div>
</div>
</div>
</div>
  </div>
@endsection
