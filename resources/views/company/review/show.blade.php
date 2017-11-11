@extends ('company.layouts.options')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="pull-left">
            <a href="{{ route('contests.index') }}"><button type="button" class="btn btn-outline-dark">Back</button></a>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
            <p class="lead">
              <strong>Project Details :</strong>
            </p>
            <p>{{ $project->name }}</p>
            <p>{{ $project->details }}</p>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <p class="lead">
            <strong>Additional Details :</strong>
          </p>
          <p>
            sadasdas dasd asd
          </p>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <div class="pull-left">
            <form method="POST" action="{{ route('company.review.reject') }}">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $participant_id }}" />
              <input type="submit" class="btn btn-danger" value="Reject" role="button" />
            </form>
          </div>
          <div class="pull-right">
            <form method="POST" action="{{ route('company.review.declare') }}">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $participant_id }}" />
              <input type="submit" class="btn btn-success" value="Declare Winner" role="button" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
