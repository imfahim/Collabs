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
          <form method="POST" action="{{ route('projects.store') }}">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="title">Name</label>
                  <input type="text" class="form-control" id="title" placeholder="Title will be shown in the contests page." name="name" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="description">Details</label>
                  <textarea class="form-control" id="description" rows="3" placeholder="Write about the contests." name="details"></textarea>
                </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                      <label class="control-label">Under Which Team</label>
                      <select class="form-control" style='font-size: 10px;' name="team">
                        @foreach ($teams as $team)
                          <option value="{{ $team->id }}">{{ $team->name }}</option>
                        @endforeach
                      </select>
                  </div>
              </div>
            </div>
          <div class="pull-right">
            <button type="submit" class="btn btn-success">Create</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
