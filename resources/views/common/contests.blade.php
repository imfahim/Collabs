@extends(session('is_user')? 'user.layouts.options' : 'company.layouts.options')

@section('title', ' | Browse Contests')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Browse Contests
          </div>
          <div class="panel-body fixed-panel" style="min-height: 680px; max-height: 680px;">
            <div class="card">
              <div class="card-body">
                <form method="POST" action="{{ route('browse.contests.search') }}">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="title">Search By Contest Title</label>
                    <input type="text" class="form-control" id="name" placeholder="Please enter possible matching title to search..." name="name" value="" required />
                  </div>
                  <div class="pull-right">
                    <button type="submit" class="btn btn-success">Search</button>
                  </div>
                </form>
              </div>
            </div>
            <hr />
            @if($searched_contests)
              @foreach ($searched_contests as $contest)
                <p>
                  <div class="search-info">
                    <label>{{ $contest->title }}</label>  ({{ $contest->start_on }}/{{ $contest->close_on }})
                    <div class="pull-right">
                      <a href="{{ route('contest.public.details', [$contest->id]) }}" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                    </div>
                  </div>
                </p>
              @endforeach
            @else
              @if($contests)
                @foreach ($contests as $contest)
                  <p>
                    <div class="search-info">
                      <label>{{ $contest->title }}</label>  ({{ $contest->start_on }} / {{ $contest->close_on }})
                      <div class="pull-right">
                        <a href="{{ route('contest.public.details', [$contest->id]) }}" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                      </div>
                    </div>
                  </p>
                @endforeach
              @else
                No Contests Yet !
              @endif
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
