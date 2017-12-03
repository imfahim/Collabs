@extends(session('is_user')? 'user.layouts.options' : 'company.layouts.options')

@section('title', ' | Browse Users')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Browse Users
          </div>
          <div class="panel-body fixed-panel" style="min-height: 680px; max-height: 680px;">
            <div class="card">
              <div class="card-body">
                <form method="POST" action="{{ route('browse.users.search') }}">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="title">Search By User's Name or Email</label>
                    <input type="text" class="form-control" id="name" placeholder="Please enter possible matching name or email to search..." name="name" value="" required />
                  </div>
                  <div class="pull-right">
                    <button type="submit" class="btn btn-success">Search</button>
                  </div>
                </form>
              </div>
            </div>
            <hr />
            @if($searched_users)
              @foreach ($searched_users as $user)
                <p>
                  <div class="search-info">
                    <label>{{ $user->name }}</label>  ({{ $user->email }} / {{ ($user->type) ? 'Organization' : 'Developer' }})
                    <div class="pull-right">
                      <a href="{{ route('profile.view', [$user->id]) }}" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                    </div>
                  </div>
                </p>
              @endforeach
            @else
              @if($users)
                @foreach ($users as $user)
                  <p>
                    <div class="search-info">
                      <label>{{ $user->name }}</label>  ({{ $user->email }} / {{ ($user->type) ? 'Organization' : 'Developer' }})
                      <div class="pull-right">
                        <a href="{{ route('profile.view', [$user->id]) }}" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                      </div>
                    </div>
                  </p>
                @endforeach
              @else
                No Users Yet !
              @endif
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
