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
            <p class="lead">{{ $project->name }}</p>
            <p>{{ $project->details }}</p>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <p class="lead">
            <strong>Project Demo Details :</strong>
          </p>
          @if($extra)
            <p class="lead">
              Github Link :
            </p>
            <p>
              <a href="{{ $extra->github }}" target="_blank" alt="#">Click Here</a> to check out !
            </p>
            <p class="lead">
              Youtube Link :
            </p>
            <p>
              <a href="{{ $extra->youtube }}" target="_blank" alt="#">Click Here</a> to check out !
            </p>
          @else
            No Demo Info Given !
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
