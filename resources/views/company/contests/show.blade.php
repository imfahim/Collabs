@extends ('company.layouts.options')

@section('title', ' | Contests - Show')

@section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="pull-left">
            <a href="{{ route('contests.index') }}"><button type="button" class="btn btn-primary">Back</button></a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
              <p class="lead">
                <strong>Contest Details :</strong>
              </p>
              <p class="lead">{{ $contest->title }}</p>
              <p>{{ $contest->description }}</p>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            Other Organizing Companies
            <div class="pull-right">
              <a href="{{ route('company.new.invite', [$contest->id]) }}" class="btn btn-sm btn-success">Invite Companies</a>
            </div>
          </div>
          <div class="panel-body fixed-panel">
            <div class="search-info">
              <label>&nbsp; Created By : {{ $owner->name }} ( {{ $owner->email }} )</label>
               <div class="pull-right">
                 <a href="{{ route('profileof.view', [$owner->id]) }}"><i class="fa fa-eye"></i></a>
               </div>
            </div>
            <hr />
            @if($companies)
              @foreach ($companies as $company)
                <div class="search-info">
                  <label>&nbsp; {{ $company->name }} ( {{ $company->email }} )</label>
                   <div class="pull-right">
                     <a href="{{ route('profileof.view', [$company->id]) }}"><i class="fa fa-eye"></i></a>
                   </div>
                </div>
                <br />
              @endforeach
            @else
              <div class="search-info">
                No Companies found yet !
              </div>
            @endif
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <p class="lead">
              <strong>Participants :</strong>
            </p>
            @if($participants)
              <table class="table table-striped" data-form="deleteForm">
                <thead>
                  <tr>
                    <th scope="col">Teams</th>
                    <th scope="col">Projects</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($participants as $participant)
                      <tr>
                        <th scope="row"><a href="{{route('team.details.company',[$participant['team_id']])}}">{{ $participant['team_name'] }}</a>
                          @foreach($participant['teams'] as $team)
                          ,<a href="{{route('team.details.company',[$team->team_id])}}">{{ $team->name }}</a>
                          @endforeach
                        </th>
                        <td>{{ $participant['project_name'] }}</td>
                        <td>
                          @if($participant['status'] === 1)
                            <span class="label label-success">Winner</span></h6>
                          @elseif($participant['status'] === 2)
                            <span class="label label-danger">Rejected</span></h6>
                          @else
                            <span class="label label-warning">On Review</span></h6>
                          @endif
                        </td>
                        <td>
                          <a href="{{ route('company.review.show', [$participant['id'], $participant['project_id']]) }}" class="btn btn-sm btn-info" role="button">Project Review</a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
            @else
              No Participants Yet !
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
