@extends ('company.layouts.options')

@section('title', ' | Browse Teams')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Browse Teams
          </div>
          <div class="panel-body fixed-panel" style="min-height: 680px; max-height: 680px;">
            <div class="card">
              <div class="card-body">
                <form method="POST" action="{{ route('browse.teams.search') }}">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="title">Search By Team Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Please enter possible matching name to search..." name="name" value="" required />
                  </div>
                  <div class="pull-right">
                    <button type="submit" class="btn btn-success">Search</button>
                  </div>
                </form>
              </div>
            </div>
            <hr />
            @if($searched_teams)
              @foreach ($searched_teams as $team)
                <p>
                  <div class="search-info">
                    <label>{{ $team->name }}</label>  ({{ $team->existing_member }}/{{ $team->total_member }})
                    <div class="pull-right">
                      <a href="{{ route('team.details.company', [$team->id]) }}" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                    </div>
                  </div>
                </p>
              @endforeach
            @else
              @if($teams)
                @foreach ($teams as $team)
                  <p>
                    <div class="search-info">
                      <label>{{ $team->name }}</label>  ({{ $team->existing_member }} / {{ $team->total_member }})
                      <div class="pull-right">
                        <a href="{{ route('team.details.company', [$team->id]) }}" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                      </div>
                    </div>
                  </p>
                @endforeach
              @else
                No Teams Yet !
              @endif
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
