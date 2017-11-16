@extends ('user.layouts.options')

@section('title', ' | Projects - Edit')

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
          <form method="POST" action="{{ route('projects.update', [$project->id]) }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put" />
            <input type="hidden" name="id" value="{{ $project->id }}" />
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="title">Name</label>
                  <input type="text" class="form-control" id="title" placeholder="Title will be shown in the projects page." name="name" value="{{ $project->name }}" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="description">Details</label>
                  <textarea class="form-control" id="description" rows="3" placeholder="Write about the project." name="details">{{ $project->details }}</textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="description">Github Link</label>
                  <input type="text" class="form-control" id="github" placeholder="Insert the github link o your project here" name="github" value="{{ $extra->github }}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="description">Demo Youtube Link</label>
                  <input type="text" class="form-control" id="youtube" placeholder="If you have any youtube demo link, enter the link here" name="youtube" value="{{ $extra->youtube }}">
                </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                      <label class="control-label">Under Which Team</label>
                      <select class="form-control" style='font-size: 10px;' name="team">
                        @foreach ($teams as $team)
                          <option value="{{ $team->id }}" {{ ($team->id === $project->team_id) ? ' selected="selected"' : '' }}>{{ $team->name }}</option>
                        @endforeach
                      </select>
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group label-floating">
                      <label class="control-label">Status</label>
                      <select name="status" style='font-size: 10px;' class="form-control">
                        <option value="1" {{ ($project->status === 1) ? 'selected' : '' }}>Development Phase</option>
                        <option value="0" {{ ($project->status === 0) ? 'selected' : '' }}>Finished</option>
                      </select>
                  </div>
              </div>
            </div>
            <div class="pull-right">
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
@endsection
