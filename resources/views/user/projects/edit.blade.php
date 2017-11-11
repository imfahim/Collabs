@extends ('user.layouts.options')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="pull-left">
            <a href="{{ route('projects.index') }}"><button type="button" class="btn btn-outline-dark">Back</button></a>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <form method="POST" action="{{ route('projects.update', [$project->id]) }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put" />
            <input type="hidden" name="id" value="{{ $project->id }}" />
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="title">Name</label>
                  <input type="text" class="form-control" id="title" placeholder="Title will be shown in the contests page." name="name" value="{{ $project->name }}" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="description">Details</label>
                  <textarea class="form-control" id="description" rows="3" placeholder="Write about the contests." name="details">{{ $project->details }}</textarea>
                </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                      <label class="control-label">Under Which Team</label>
                      <select class="form-control" name="team">
                        @foreach ($teams as $team)
                          <option value="{{ $team->id }}" {{ ($team->id === $project->team_id) ? ' selected="selected"' : '' }}>{{ $team->name }}</option>
                        @endforeach
                      </select>
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group label-floating">
                      <label class="control-label">Status</label>
                      <select name="status" class="form-control">
                        <option value="1" {{ ($project->status === 1) ? 'selected' : '' }}>Development Phase</option>
                        <option value="0" {{ ($project->status === 0) ? 'selected' : '' }}>Finished</option>
                      </select>
                  </div>
              </div>
            </div>
            <div class="pull-right">
              <button type="submit" class="btn btn-outline-success">Save</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
@endsection
