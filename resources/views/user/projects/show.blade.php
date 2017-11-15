@extends ('user.layouts.options')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="pull-left">
            <a href="{{ route('projects.index') }}"><button type="button" class="btn btn-primary">Back</button></a>
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
            <strong>Project Demo Details :</strong>
          </p>
          Not Yet !
        </div>
      </div>

    </div>
  </div>
@endsection
