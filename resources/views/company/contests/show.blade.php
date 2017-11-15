@extends ('company.layouts.options')

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
      <div class="card">
        <div class="card-body">
            <p class="lead">
              <strong>Contest Details :</strong>
            </p>
            <p>{{ $contest->title }}</p>
            <p>{{ $contest->description }}</p>
        </div>
      </div>
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
                      <th scope="row">{{ $participant['team_name'] }}</th>
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
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
